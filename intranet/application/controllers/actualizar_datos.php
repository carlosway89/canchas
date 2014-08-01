<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Actualizar_datos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/usuario_model');
        $this->loaders->verificaAcceso('W');
    }

    public function index() {
        
        $code_usuario = $this->session->userdata('nUsuID');
        $data['main_content'] = 'perfil_usuario/actualizar_datos/panel_view';
        $data['title'] = '.: Solo Canchas - Módulo de Actualización de Datos :.';
        $data['menu_home'] = 'intranet';
        $data['breadcrumbs'] = 'Módulo de Actualización de Datos';
        
        $this->usuario_model->getDatosUsuario(array('LIST-PERSON-POR-CODE-PERSONA', $code_usuario, ''));
        $data["nPerID"] = $this->usuario_model->getPerId(); 
        $data["NombresUser"] = $this->usuario_model->getPerNombres();
        $data["ApellidosUser"] = $this->usuario_model->getPerApellidos();
        $data["EmailUser"] = $this->usuario_model->getPerEmail();

        $this->load->view('master/template_view', $data);
    }

}