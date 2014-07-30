<?php

class Cambiar_Clave extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('admin/clave_model');
        $this->load->model('admin/usuario_model');
    }

    function index() {
        $this->loaders->verificaAcceso('W');
        $data['titulo'] = '.: SoloCanchas. - Módulo de Actualización de Clave :.';
        $data['main_content'] = 'perfil_usuario/cambiar_clave/panel_view';
        $data['breadcrumbs'] = 'Módulo de Actualización de Clave';
        $this->load->view('master/template_view', $data);
    }

    function getClaveAnterior() {
        $cod_person = $this->session->userdata('nPerID');
        $clave_anterior = $this->input->post('clave_anterior');
        $usuario = $this->session->userdata('usuario');
                
        $query = $this->clave_model->getClaveAnterior($cod_person,$usuario,md5($clave_anterior));
        
        if ($query) {
            echo "1";
        } else {
            echo "2";
        }
    }

    function claveUserUpd($usuID) {
        $this->form_validation->set_rules('txt_upd_clave_anterior', 'usuario', 'required|trim');
        $this->form_validation->set_rules('txt_upd_clave_nueva', 'clave', 'required|trim');
        $this->form_validation->set_rules('txt_upd_clave_repeat', 'repetir clave', 'required|trim');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        if ($this->form_validation->run() == true) {
            $this->usuario_model->setUsuID($usuID);
            $this->usuario_model->setUsuClave($this->input->post('txt_upd_clave_nueva'));
            $query = $this->usuario_model->usuariosUpdClave();
            if ($query) {
                echo "1";
            } else {
                echo "2";
            }
        }
    }
}

?>
