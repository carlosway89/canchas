<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Canchas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/canchas_model');
        $this->load->model('admin/ubigeo_model');
        $this->load->model('codegen_model', '', TRUE);
        $this->loaders->verificaAcceso('W');

        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Canchas'));
        if(!$acceso)
            redirect(base_url().'manage');
    }

    public function index() {
        $data['main_content'] = 'canchas/panel_view';
        $data['title'] = '.: Panel de Administración - Módulo de Canchas :.';
        $data['breadcrumbs'] = 'Módulo de Canchas';
        $data['list_departamentos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        $this->load->view('master/template_view', $data);
    }

    function canchasQry() {
        $data['list_canchas'] = $this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO', '', '', '', ''));
        $this->load->view('canchas/qry_view', $data);
    }

    function canchasIns() {
        $this->form_validation->set_rules('txt_ins_can_nombre', 'nombre', '|trim|required');
        $this->form_validation->set_rules('txt_ins_can_descripcion', 'descripción', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_can_departamentos', 'departamento', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_can_provincias', 'provincia', '|trim|required');
        $this->form_validation->set_rules('cbo_ins_can_distritos', 'distrito', '|trim|required');
        $this->form_validation->set_rules('txt_ins_can_direccion', 'direccion', '|trim|required');
        $this->form_validation->set_rules('txt_ins_can_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_ins_can_telefono', 'telefono', '|trim|required');
        $this->form_validation->set_rules('txt_ins_can_nrocanchas', 'número de canchas', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->canchas_model->setCanNombre($this->input->post('txt_ins_can_nombre'));
            $this->canchas_model->setCanDescripcion($this->input->post('txt_ins_can_descripcion'));
            $this->canchas_model->setCanLatitud($this->input->post('hid_ins_can_latitud'));
            $this->canchas_model->setCanLongitud($this->input->post('hid_ins_can_longitud'));
            $this->canchas_model->setCanDepartamento($this->input->post('cbo_ins_can_departamentos'));
            $this->canchas_model->setCanProvincia($this->input->post('cbo_ins_can_provincias'));
            $this->canchas_model->setCanDistrito($this->input->post('cbo_ins_can_distritos'));
            $this->canchas_model->setCanDireccion($this->input->post('txt_ins_can_direccion'));
            $this->canchas_model->setCanTelefono($this->input->post('txt_ins_can_telefono'));
            $this->canchas_model->setCanFacebook($this->input->post('txt_ins_can_facebook'));
            $this->canchas_model->setCanEmail($this->input->post('txt_ins_can_email'));
            $this->canchas_model->setCanSitioWeb($this->input->post('txt_ins_can_web'));
            $this->canchas_model->setCanNroCanchas($this->input->post('txt_ins_can_nrocanchas'));
            
            if($this->input->post('txt_ins_can_foto') == ""){
                $foto_cancha = "http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-6187969c-af55-4b3f-b4c6-ae8ccdb28a65-nofoto.jpg";
            }else{
                $foto_cancha = $this->input->post('txt_ins_can_foto');
            }
            
            $this->canchas_model->setCanFotoPortada($foto_cancha);
            
            $result = $this->canchas_model->canchasIns();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

    function canchasGet($nCanId) {
        $query = $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanId, '', '', ''));

        if ($query) {
            $data['nCanID'] = $this->canchas_model->getCanID();
            $data['cCanNombre'] = $this->canchas_model->getCanNombre();
            $data['cCanDescripcion'] = $this->canchas_model->getCanDescripcion();
            $data['cCanLatitud'] = $this->canchas_model->getCanLatitud();
            $data['cCanLongitud'] = $this->canchas_model->getCanLongitud();
            $data['nDepaID'] = $this->canchas_model->getCanDepartamento();
            $data['nProvID'] = $this->canchas_model->getCanProvincia();
            $data['nDisID'] = $this->canchas_model->getCanDistrito();
            $data['fecha_registro'] = $this->canchas_model->getCanFechaRegistro();
            $data['cCanDireccion'] = $this->canchas_model->getCanDireccion();
            $data['cCanTelefono'] = $this->canchas_model->getCanTelefono();
            $data['nCanNroCanchas'] = $this->canchas_model->getCanNroCanchas();
            $data['cCanFacebook'] = $this->canchas_model->getCanFacebook();
            $data['cCanEmail'] = $this->canchas_model->getCanEmail();
            $data['cCanSitioWeb'] = $this->canchas_model->getCanSitioWeb();
            $data['nCanVisitas'] = $this->canchas_model->getCanVisitas();
            $data['cCanEstado'] = $this->canchas_model->getCanEstado();
            $data['cCanFotoPortada'] = $this->canchas_model->getCanFotoPortada();
            return $data;
        } else {
            return false;
        }
    }
    
    function panelEditar($nCanId){
        $data = $this->canchasGet($nCanId);
        $data['list_departamentos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        $data['list_provincias'] = $this->ubigeo_model->ubigeoQry(array('L-U-PRO', $data['nDepaID'], ''));
        $data['list_distritos'] = $this->ubigeo_model->ubigeoQry(array('L-U-DIS', $data['nDepaID'], $data['nProvID']));
        $this->load->view('canchas/upd_view', $data);
    }
    
    function canchasUpd($nCanID) {
        $this->form_validation->set_rules('txt_upd_can_nombre', 'nombre', '|trim|required');
        $this->form_validation->set_rules('txt_upd_can_descripcion', 'descripción', '|trim|required');
        $this->form_validation->set_rules('cbo_upd_can_departamentos', 'departamento', '|trim|required');
        $this->form_validation->set_rules('cbo_upd_can_provincias', 'provincia', '|trim|required');
        $this->form_validation->set_rules('cbo_upd_can_distritos', 'distrito', '|trim|required');
        $this->form_validation->set_rules('txt_upd_can_direccion', 'direccion', '|trim|required');
        $this->form_validation->set_rules('txt_upd_can_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_upd_can_telefono', 'telefono', '|trim|required');
        $this->form_validation->set_rules('txt_upd_can_nrocanchas', 'número de canchas', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->canchas_model->setCanID($nCanID);
            $this->canchas_model->setCanNombre($this->input->post('txt_upd_can_nombre'));
            $this->canchas_model->setCanDescripcion($this->input->post('txt_upd_can_descripcion'));
            $this->canchas_model->setCanLatitud($this->input->post('hid_upd_can_latitud'));
            $this->canchas_model->setCanLongitud($this->input->post('hid_upd_can_longitud'));
            $this->canchas_model->setCanDepartamento($this->input->post('cbo_upd_can_departamentos'));
            $this->canchas_model->setCanProvincia($this->input->post('cbo_upd_can_provincias'));
            $this->canchas_model->setCanDistrito($this->input->post('cbo_upd_can_distritos'));
            $this->canchas_model->setCanDireccion($this->input->post('txt_upd_can_direccion'));
            $this->canchas_model->setCanTelefono($this->input->post('txt_upd_can_telefono'));
            $this->canchas_model->setCanFacebook($this->input->post('txt_upd_can_facebook'));
            $this->canchas_model->setCanEmail($this->input->post('txt_upd_can_email'));
            $this->canchas_model->setCanSitioWeb($this->input->post('txt_upd_can_web'));
            $this->canchas_model->setCanNroCanchas($this->input->post('txt_upd_can_nrocanchas'));
            
            if($this->input->post('txt_upd_can_foto') == ""){
                $foto_cancha = "http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-6187969c-af55-4b3f-b4c6-ae8ccdb28a65-nofoto.jpg";
            }else{
                $foto_cancha = $this->input->post('txt_upd_can_foto');
            }
            
            $this->canchas_model->setCanFotoPortada($foto_cancha);
            
            $result = $this->canchas_model->canchasUpd();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

    function canchasDel($nCanID) {
        $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanID, '', '', ''));

        if ($this->canchas_model->getCanEstado() == "H") {
            $estado = 'I';
        } else {
            $estado = 'H';
        }

        $query = $this->canchas_model->canchasDel(array('DEL-CANCHAS', $nCanID, $estado,'','','','','','','','','','','','',''));
        if ($query) {
            echo "1";
        } else {
            echo "2";
        }
    }
    function galeria(){

        $id_cancha=$this->uri->segment(3);
        if($id_cancha==null || $id_cancha==0)
            redirect(base_url().'canchas');

        $data['main_content'] = 'canchas/galeria_view';
        $data['title'] = '.: Panel de Administración - Módulo de Canchas :.';
        $data['breadcrumbs'] = 'Módulo de Canchas';
        $data['nCanID'] = $id_cancha;
        $data['list_galeria'] = $this->canchas_model->canchasGaleria(array('LISTADO-GALERIA-CANCHAS', $id_cancha, '', '', ''));
        $this->load->view('master/template_view', $data);

    }
    function agregar_foto(){

        $this->data['custom_error'] = '';

        $data_multimedia = array(
            'nMultTipoID' => 1,
            'nMultCategID' => 3,
            'cMultLinkMiniatura' => $_POST['foto_url'],
            'cMultLink' => $_POST['foto_url'],
            'cMultTitulo' => 'foto cancha',
            'cMultDescripcion' => 'galleria de canchas',
            'cMultFechaRegistro' => date('Y-m-d'),
            'cMultFechaInicial' => date('Y-m-d'),
            'cMultFechaFinal' => date('Y-m-d'),
            'cMultEstado' => 'H',
            'cMultNumVisitas' => 0
            );
        

        $id_cancha=$_POST['nCanID'];

        $id_multimedia=$this->codegen_model->add('multimedia',$data_multimedia);

        if ( $id_multimedia!= 0)
        {
            $data = array(
            'nMultID' => $id_multimedia,
            'nCanID' => $id_cancha
            );

            if ($this->codegen_model->add('multimedia_canchas',$data)) {
                redirect(base_url().'canchas/galeria/'.$id_cancha);
            }
             
        }
        else
        {
             $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
        }



    }
    function delete_foto(){

        $ID = $this->uri->segment(3);
        if ($this->codegen_model->delete('multimedia_canchas', 'nMultID', $ID)) {
           if ($this->codegen_model->delete('multimedia', 'nMultID', $ID)) {
              redirect(base_url() . 'canchas/galeria/'.$this->uri->segment(4));
           }
        }
        else{
            echo 'error';
        }

        

    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */