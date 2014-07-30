<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registro_Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/usuarios_model');
    }

    public function index() {
        $this->load->view('registro_usuarios/panel_view');
    }

    function usuariosIns() {
        $this->form_validation->set_rules('txt_ins_user_nombres', 'nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_apellidos', 'apellidos', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_clave', 'clave', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_repeclave', 'repetir clave', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');
        
        if ($this->form_validation->run() == true) {
            $this->usuarios_model->setPerNombres($this->input->post('txt_ins_user_nombres'));
            $this->usuarios_model->setPerApellidos($this->input->post('txt_ins_user_apellidos'));
            $this->usuarios_model->setPerEmail($this->input->post('txt_ins_user_email'));
            $this->usuarios_model->setUsuClave($this->input->post('txt_ins_user_clave'));
            $resul = $this->usuarios_model->usuariosIns();

            if ($resul) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */