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
        
        $data['main_content'] = 'reportes/analytic';
        $data['title'] = '.: Solo Canchas - Intranet :.';
        $data['menu_home'] = 'intranet';
        $data['breadcrumbs'] = 'Analytic';

        $url = "https://www.google.com/analytics/web/?hl=es&pli=1#report/visitors-overview/a53640004w86384306p89625506/";  
        

        $data['response'] = file_get_contents($url); 

        $this->load->view('master/template_view', $data);


    }


    

}