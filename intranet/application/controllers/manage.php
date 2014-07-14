<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {

    public function index() {
    	
        $data['main_content'] = 'master/body_view';
        $data['title'] = '.: Solo Canchas - Intranet :.';
        $data['menu_home'] = 'intranet';
        $data['breadcrumbs'] = 'Panel';
        $this->load->view('master/template_view', $data);
    }

}