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
            $this->usuarios_model->setNombres($this->input->post('txt_ins_user_nombres'));
            $this->usuarios_model->setApellidos($this->input->post('txt_ins_user_apellidos'));
            $this->usuarios_model->setEmail($this->input->post('txt_ins_user_email'));
            $this->usuarios_model->setContraseña($this->input->post('txt_ins_user_clave'));
//            $nacer = explode("/", $this->input->post('txt_ins_usu_fecnac'));
//            $fechanac = $nacer[2] . "-" . $nacer[1] . "-" . $nacer[0];
//            $this->usuarios_model->setPerFechaNacimiento($fechanac);
//            $this->usuarios_model->setPerSexo($this->input->post('cbo_ins_usu_sexo'));
//            $this->usuarios_model->setPerTelefono($this->input->post('txt_ins_usu_telefono'));
//            $this->usuarios_model->setPerCelular($this->input->post('txt_ins_usu_celular'));
//            $this->usuarios_model->setPerEmail($this->input->post('txt_ins_usu_email'));
//            $this->usuarios_model->setPerFacebook($this->input->post('txt_ins_usu_facebook'));
//            $this->usuarios_model->setPerSkype($this->input->post('txt_ins_usu_skype'));
//            $this->usuarios_model->setPerArea($this->input->post('cbo_ins_usu_departamentos'));
//            $this->usuarios_model->setPerCargo($this->input->post('cbo_ins_usu_cargos'));
//            $nombre_user = explode("@", $this->input->post('txt_ins_usu_email'));
//            $this->usuarios_model->setUsuNick($nombre_user[0]);
//            $this->usuarios_model->setUsuClave('123456');
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