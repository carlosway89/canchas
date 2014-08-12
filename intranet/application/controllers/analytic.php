<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Analytic extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->loaders->verificaAcceso('W');

        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Analytic'));
        if(!$acceso)
            redirect(base_url().'manage');
    }
    
    public function index() {
        
        $data['main_content'] = 'master/body_view';
        $data['title'] = '.: Solo Canchas - Intranet :.';
        $data['menu_home'] = 'intranet';
        $data['breadcrumbs'] = 'Analytic';
        $this->load->view('master/template_view', $data);
    }
    

}