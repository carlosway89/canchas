<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ubigeo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/ubigeo_model');
    }

    function getUbigeo() {
        $data['Id_Departamento'] = $this->input->post('Id_Departamento');
        $data['Id_Provincia'] = $this->input->post('Id_Provincia');
        $data['name_ubigeo'] = $this->input->post('name_ubigeo');
        $data['name_mantenedor'] = $this->input->post('name_mantenedor');
        $data['accion_ubigeo'] = $this->input->post('accion_ubigeo');


        if ($data['name_ubigeo'] == 'departamentos') {
            $data['Ubigeo'] = $this->ubigeo_model->ubigeoQry(array('L-U-DEP', '', ''));
        } else if ($data['name_ubigeo'] == 'provincias') {
            $result = $this->ubigeo_model->qryubigeos('L-U-PRO', $data['Id_Departamento'], '', $data['accion_ubigeo'], $data['name_mantenedor'], $data['name_ubigeo']);
            print_r($result);
        } else if ($data['name_ubigeo'] == 'distritos') {
            $result = $this->ubigeo_model->qryubigeos('L-U-DIS', $data['Id_Departamento'], $data['Id_Provincia'], $data['accion_ubigeo'], $data['name_mantenedor'], $data['name_ubigeo']);
            print_r($result);
        }
    }
}
