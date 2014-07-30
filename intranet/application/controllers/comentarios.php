<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comentarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/comentarios_canchas_model');
        //$this->load->model('admin/permisos_model');
    }

    public function index() {
        $data['main_content'] = 'comentarios/panel_view';
        $data['title'] = '.: Panel de Administración - Módulo de Comentarios de las Canchas :.';
        $data['breadcrumbs'] = 'Módulo de Comentarios de las Canchas';
        $data['list_comentarios'] = $this->comentarios_canchas_model->comentarios_canchasQry(Array('LISTADO-COMENTARIOS-CANCHAS-CRITERIO'));
        
        $this->load->view('master/template_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */