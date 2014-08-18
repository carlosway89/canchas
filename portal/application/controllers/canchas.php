<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Canchas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/ubigeo_model');
        $this->load->model('admin/canchas_model');
        $this->load->model('admin/comentarios_canchas_model');
        $this->load->model('admin/noticias_model');
        $this->load->helper(array('form', 'url', 'codegen_helper'));
        $this->load->model('codegen_model', '', TRUE);
    }

    public function index() {
        $data['main_content'] = 'canchas/body_view';
        $data['title'] = '.: Solo Canchas - Canchas :.';
        $data['menu_home'] = 'canchas';
        $data['list_departamentos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        $data['list_noticias'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-CRITERIO',''));
        $data['noticia_principal'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-PRINCIPAL',''));
        
        $data['list_publicidad'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultEstado,cMultNumVisitas', 'nMultCategID = 5', null);

        $data['list_canchas_favoritas'] = $this->canchas_model->canchasQry(array('LISTADO-CANCHA-TOP10','','','',''));
        $data['canchas_filtro'] = $this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO',null,'13','1','1350'));

        $data['cancha_top1'] = $this->canchas_model->canchasQry(array('CANCHA-TOP1','','','',''));
        $this->load->view('master/template_view', $data);
    }

    public function busqueda($criterio) {
        $valor_criterio = explode("_", $criterio);
        $texto_criterio = str_replace("-", " ", $valor_criterio[0]);

        $data['main_content'] = 'canchas/qry_view';
        $data['title'] = '.: Solo Canchas - Busqueda de Canchas :.';
        $data['menu_home'] = 'canchas';
        $data['list_canchas'] = $this->canchas_model->canchasQry(
                array(
                    'LISTADO-CANCHAS-CRITERIO',
                    $texto_criterio,
                    $valor_criterio[1],
                    $valor_criterio[2],
                    $valor_criterio[3]
                )
        );

        if (count($data['list_canchas']) == 1) {
            foreach ($data['list_canchas'] as $row) {
                $id_cancha = $row->nCanID;
                $name_cancha = $row->cCanNombre;
            }
            redirect("/canchas/informacion/".str_replace(" ", "-", $name_cancha) . "_" . $id_cancha);
        } else {
            if (count($data['list_canchas']) < 1) {
                $this->busqueda_inteligente($texto_criterio);
                
            }else{
                $this->load->view('master/template_view', $data);
            }

            
        }
    }

    public function busqueda_inteligente($texto_criterio){

        $data['main_content'] = 'canchas/qry_view';
        $data['title'] = '.: Solo Canchas - Busqueda de Canchas :.';
        $data['menu_home'] = 'canchas';

        $leng=strlen($texto_criterio);

        if($leng<3){
            
            $this->busqueda_reemplazo($texto_criterio);
            // $data['list_canchas']=null;
            // $this->load->view('master/template_view', $data);

        }else{
            $end=round(strlen($texto_criterio)/2);
            $texto_cortado=substr($texto_criterio,0,$end);

            $resultado=$this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO',$texto_cortado,'','',''));

            if (count($resultado) >= 1) {
                $data['list_canchas']=$resultado;
                $this->load->view('master/template_view', $data);
                // print_r($resultado);
            }
            else{
                $this->busqueda_inteligente($texto_cortado);
            }
        }
    }

    public function busqueda_reemplazo($texto_criterio){
        $data['main_content'] = 'canchas/qry_view';
        $data['title'] = '.: Solo Canchas - Busqueda de Canchas :.';
        $data['menu_home'] = 'canchas';
        $data['list_canchas']=null;

        $parecidos= array(
            's' => 'c', 
            'b' => 'v',
            'c' => 's',
            'v' => 'b',
            'n' => 'm',
            'm' => 'n',
            'z' => 's',
            's' => 'z',
            'c' => 'z',
            'z' => 'c',
            'u' => 'ou',
            'i' => 'y',
            'y' => 'i'  
        );

        foreach ($parecidos as $key => $value) {

            $texto_criterio=str_replace($key,$value,$texto_criterio);
            $resultado=$this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO',$texto_criterio,'','',''));

            if (count($resultado) >= 1) {
                $data['list_canchas']=$resultado;
            }
        }        


        $this->load->view('master/template_view', $data);




    }
    public function busqueda_filtros($dep,$pro,$dis) {
        
        $list_canchas = $this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO',null,$dep,$pro,$dis));

        if (count($list_canchas) < 1) {
            echo 0;
        } else {
            echo json_encode($list_canchas);           
        }
    }

    public function informacion($nombre_cancha_id) {
        $cadena = explode("_", $nombre_cancha_id);
        $data = $this->canchasGet($cadena[1]);
        $data['main_content'] = 'canchas/info_cancha_selected_view';
        $data['title'] = '.: Solo Canchas - Información de la Cancha seleccionada :.';
        $data['menu_home'] = 'canchas';
        $data['list_galeria'] = $this->canchas_model->canchasGaleria(array('LISTADO-GALERIA-CANCHAS', $cadena[1], '', '', ''));
        $data['list_otrascanchas'] = $this->canchas_model->canchasQryOtros(array('LISTADO-CANCHAS-OTROS', $cadena[1], '', '', ''));
        $data['nombre_id']=$nombre_cancha_id;
        $data['list_comentarios'] = $this->codegen_model->get('comentarios_canchas', 'nComcaID,nCanID,cComcaNombrePersona,cComcaTexto,dComcaFechaRegistro', 'nCanID = '.$cadena[1], null);
       
        $this->load->view('master/template_view', $data);

        $this->click_visita($cadena[1]);
    }

    function canchasGet($nCanId) {
        $query = $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanId, '', '', ''));

        if ($query) {
            $data['nCanID'] = $this->canchas_model->getCanID();
            $data['cCanNombre'] = $this->canchas_model->getCanNombre();
            $data['cCanDescripcion'] = $this->canchas_model->getCanDescripcion();
            $data['cCanLatitud'] = $this->canchas_model->getCanLatitud();
            $data['cCanLongitud'] = $this->canchas_model->getCanLongitud();
            $data['fecha_registro'] = $this->canchas_model->getCanFechaRegistro();
            $data['cCanDireccion'] = $this->canchas_model->getCanDireccion();
            $data['cCamTelefono'] = $this->canchas_model->getCanTelefono();
            $data['nCanNroCanchas'] = $this->canchas_model->getCanNroCanchas();
            $data['cCanFacebook'] = $this->canchas_model->getCanFacebook();
            $data['cCanEmail'] = $this->canchas_model->getCanEmail();
            $data['cCanSitioWeb'] = $this->canchas_model->getCanSitioWeb();
            $data['nCanVisitas'] = $this->canchas_model->getCanVisitas();
            $data['cCanEstado'] = $this->canchas_model->getCanEstado();
            $data['cCanFotoPortada'] = $this->canchas_model->getCanFotoPortada();
            $data['nCanEnlace'] = $this->canchas_model->getCanEnlace();
            return $data;
        } else {
            return false;
        }
    }
    function comentar(){

        $data = array(
                'nCanID' => $this->input->post('nCanID'),
                'cComcaNombrePersona' => $this->input->post('cComcaNombrePersona'),
                'cComcaTexto' => $this->input->post('cComcaTexto'),
                'nComcaPadreID' => '1',
                'dComcaFechaRegistro' => date('Y-m-d'),
                'cComcaEstado' => 'H',
                'nComcaEmail' => $this->input->post('nComcaEmail')
        );
       
        if ($this->codegen_model->add('comentarios_canchas',$data) == TRUE)
        {   
            redirect(base_url().'canchas/informacion/'.$this->input->post('nombre_id'));
        }
        else
        {
            echo '<div class="form_error"><p>An Error Occured.</p></div>';

        }

    }

    public function click_visita($id_cancha){

        $actual_visita = $this->codegen_model->get('canchas','nCanVisitas','nCanID = '.$id_cancha,null);

        $nueva_visita=(int)$actual_visita[0]['nCanVisitas'] + 1;
        
        $data = array(
                    'nCanVisitas' => $nueva_visita,
        );
           
        $this->codegen_model->edit('canchas',$data,'nCanID',$id_cancha);

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */