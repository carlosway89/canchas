<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactenos extends CI_Controller {

    public function index() {
        $data['main_content'] = 'contactenos/contacto_view';
        $data['title'] = '.: Solo Canchas - Contactenos :.';
        $data['menu_home'] = 'contacto';
        $this->load->view('master/template_view', $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */