<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/usuario_model');
        $this->load->model('admin/permisos_model');
    }

    public function index() {
        $data['main_content'] = 'usuarios/panel_view';
        $data['title'] = '.: Panel de Administración - Módulo de Usuarios :.';
        $data['breadcrumbs'] = 'Módulo de Usuarios';
        $this->load->view('master/template_view', $data);
    }
    
    function usuariosQry(){
        $data['list_usuarios'] = $this->usuario_model->usuariosQry(array('LIST-PERSON-POR-CRITERIO', '', ''));
        $this->load->view('usuarios/qry_view', $data);
    }

    function usuariosIns() {
        $this->form_validation->set_rules('txt_ins_user_nombres', 'nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_apellidos', 'apellidos', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_clave', 'clave', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_repeclave', 'repetir clave', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->usuario_model->setPerNombres($this->input->post('txt_ins_user_nombres'));
            $this->usuario_model->setPerApellidos($this->input->post('txt_ins_user_apellidos'));
            $this->usuario_model->setPerEmail($this->input->post('txt_ins_user_email'));
            $this->usuario_model->setUsuClave($this->input->post('txt_ins_user_clave'));

            $result = $this->usuario_model->usuariosIns();

            if ($result) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }
    
    function getUserPermisos() {
        $id_user = $this->input->post('id_usuario');
        //$nombreuser = $this->input->post('nombreuser');
        $data["Opciones"] = $this->permisos_model->permisosQry(Array('LISTAR-PERMISOS-USER', $id_user, ''));
        
//        print_r($data["Opciones"]);
//        exit();
        
//        print_r($data);
//        exit();
        
        //$data["code_user"] = $id_user;
        //$data["nombreuser"] = $nombreuser;
        $this->load->view('usuarios/permisos/panel_view', $data);
    }
    
    function usuariosDel($nUsuID){
      $query = $this->usuario_model->usuariosDel(array('DEL-USUARIOS', $nUsuID, ''));
      if($query){
          echo "1";
      }else{
          echo "2";
      }
    }

//    public function busqueda($criterio) {
//        $valor_criterio = explode("_", $criterio);
//        $texto_criterio = str_replace("-", " ", $valor_criterio[0]);
//
//        $data['main_content'] = 'canchas/qry_view';
//        $data['title'] = '.: Solo Canchas - Busqueda de Canchas :.';
//        $data['menu_home'] = 'canchas';
//        $data['list_canchas'] = $this->canchas_model->canchasQry(
//                array(
//                    'LISTADO-CANCHAS-CRITERIO',
//                    $texto_criterio,
//                    $valor_criterio[1],
//                    $valor_criterio[2],
//                    $valor_criterio[3]
//                )
//        );
//
//        if (count($data['list_canchas']) == 1) {
//            foreach ($data['list_canchas'] as $row) {
//                $id_cancha = $row->nCanID;
//                $name_cancha = $row->cCanNombre;
//            }
//            redirect("../index.php/canchas/informacion/".str_replace(" ", "-", $name_cancha) . "_" . $id_cancha);
//        } else {
//            $this->load->view('master/template_view', $data);
//        }
//    }
//
//    public function informacion($nombre_cancha_id) {
//        $cadena = explode("_", $nombre_cancha_id);
//        $data = $this->canchasGet($cadena[1]);
//        $data['main_content'] = 'canchas/info_cancha_selected_view';
//        $data['title'] = '.: Solo Canchas - Información de la Cancha seleccionada :.';
//        $data['menu_home'] = 'canchas';
//        $data['list_otrascanchas'] = $this->canchas_model->canchasQryOtros(array('LISTADO-CANCHAS-OTROS', $cadena[1], '', '', ''));
//        $data['list_comentarios'] = $this->comentarios_canchas_model->comentarios_canchasQry(array('LISTADO-COMENTARIOS-CANCHAS-CRITERIO'));
//       
//        $this->load->view('master/template_view', $data);
//    }
//
//    function canchasGet($nCanId) {
//        $query = $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanId, '', '', ''));
//
//        if ($query) {
//            $data['nCanID'] = $this->canchas_model->getCanID();
//            $data['cCanNombre'] = $this->canchas_model->getCanNombre();
//            $data['cCanDescripcion'] = $this->canchas_model->getCanDescripcion();
//            $data['cCanLatitud'] = $this->canchas_model->getCanLatitud();
//            $data['cCanLongitud'] = $this->canchas_model->getCanLongitud();
//            $data['fecha_registro'] = $this->canchas_model->getCanFechaRegistro();
//            $data['cCanDireccion'] = $this->canchas_model->getCanDireccion();
//            $data['cCamTelefono'] = $this->canchas_model->getCanTelefono();
//            $data['nCanNroCanchas'] = $this->canchas_model->getCanNroCanchas();
//            $data['cCanFacebook'] = $this->canchas_model->getCanFacebook();
//            $data['cCanEmail'] = $this->canchas_model->getCanEmail();
//            $data['cCanSitioWeb'] = $this->canchas_model->getCanSitioWeb();
//            $data['nCanVisitas'] = $this->canchas_model->getCanVisitas();
//            $data['cCanEstado'] = $this->canchas_model->getCanEstado();
//            return $data;
//        } else {
//            return false;
//        }
//    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */