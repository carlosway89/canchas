<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->_Esta_logeado();
        $this->loaders->verificaAcceso('W');
    }
    
    public function index() {
        $this->loaders->verificaAcceso('W');
        $data['main_content'] = 'master/body_view';
        $data['title'] = '.: Solo Canchas - Intranet :.';
        $data['menu_home'] = 'intranet';
        $data['breadcrumbs'] = 'Panel';
        $this->load->view('master/template_view', $data);
    }
    
    function _Esta_logeado() {
        $esta_logeado = $this->session->userdata('esta_logeado');
        $nPerID = $this->session->userdata('nPerID');
        if ($esta_logeado != true OR $nPerID = '') {
            redirect('acceso');
        }
    }

}