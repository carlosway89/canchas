<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Canchas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/canchas_model');
    }

    public function index() {
        $data['main_content'] = 'canchas/panel_view';
        $data['title'] = '.: Panel de Administración - Módulo de Canchas :.';
        $data['breadcrumbs'] = 'Módulo de Canchas';
        $this->load->view('master/template_view', $data);
    }

    function canchasQry() {
        $data['list_canchas'] = $this->canchas_model->canchasQry(array('LISTADO-CANCHAS-CRITERIO','','','',''));
        $this->load->view('canchas/qry_view', $data);
    }

    function canchasIns() {
        $this->form_validation->set_rules('txt_ins_user_nombres', 'nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_apellidos', 'apellidos', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_clave', 'clave', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_repeclave', 'repetir clave', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->canchas_model->setPerNombres($this->input->post('txt_ins_user_nombres'));
            $this->canchas_model->setPerApellidos($this->input->post('txt_ins_user_apellidos'));
            $this->canchas_model->setPerEmail($this->input->post('txt_ins_user_email'));
            $this->canchas_model->setUsuClave($this->input->post('txt_ins_user_clave'));

            $result = $this->canchas_model->canchasIns();

            if ($result) {
               $this->enviar_email('registro', 'luiggichirinos_p@outlook.com', $this->input->post('txt_ins_user_clave'));
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

    function canchasGet($nCanId) {
        $query = $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanId, '', '', ''));

        if ($query) {
            $data['nCanID'] = $this->canchas_model->getCanID();
            $data['cCanNombre'] = $this->canchas_model->getCanNombre();
            $data['cCanDescripcion'] = $this->canchas_model->getCanDescripcion();
            $data['cCanLatitud'] = $this->canchas_model->getCanLatitud();
            $data['cCanLongitud'] = $this->canchas_model->getCanLongitud();
            $data['fecha_registro'] = $this->canchas_model->getCanFechaRegistro();
            $data['cCanDireccion'] = $this->canchas_model->getCanDireccion();
            $data['cCamTelefono'] = $this->canchas_model->getCanTelefono();
            $data['nCanNroCanchas'] = $this->canchas_model->getCanNroCanchas();
            $data['cCanFacebook'] = $this->canchas_model->getCanFacebook();
            $data['cCanEmail'] = $this->canchas_model->getCanEmail();
            $data['cCanSitioWeb'] = $this->canchas_model->getCanSitioWeb();
            $data['nCanVisitas'] = $this->canchas_model->getCanVisitas();
            $data['cCanEstado'] = $this->canchas_model->getCanEstado();
            return $data;
        } else {
            return false;
        }
    }
    
    function canchasDel($nCanID) {
        $this->canchas_model->canchasGet(array('LISTADO-CANCHAS-CODIGO', $nCanID, '','',''));

        if ($this->canchas_model->getCanEstado() == "H") {
            $estado = 'I';
        } else {
            $estado = 'H';
        }

        $query = $this->canchas_model->canchasDel(array('DEL-CANCHAS', $nCanID, $estado));
        if ($query) {
            echo "1";
        } else {
            echo "2";
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */