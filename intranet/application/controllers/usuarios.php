<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/usuario_model');
        $this->load->model('admin/permisos_model');
    }

    public function index() {
        $data['main_content'] = 'usuarios/panel_view';
        $data['title'] = '.: Panel de Administración - Módulo de Usuarios :.';
        $data['breadcrumbs'] = 'Módulo de Usuarios';
        $this->load->view('master/template_view', $data);
    }

    function usuariosQry() {
        $data['list_usuarios'] = $this->usuario_model->usuariosQry(array('LIST-PERSON-POR-CRITERIO', '', ''));
        $this->load->view('usuarios/qry_view', $data);
    }

    function usuariosIns() {
        $this->form_validation->set_rules('txt_ins_user_nombres', 'nombres', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_apellidos', 'apellidos', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_email', 'email', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_clave', 'clave', '|trim|required');
        $this->form_validation->set_rules('txt_ins_user_repeclave', 'repetir clave', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->usuario_model->setPerNombres($this->input->post('txt_ins_user_nombres'));
            $this->usuario_model->setPerApellidos($this->input->post('txt_ins_user_apellidos'));
            $this->usuario_model->setPerEmail($this->input->post('txt_ins_user_email'));
            $this->usuario_model->setUsuClave($this->input->post('txt_ins_user_clave'));

            $result = $this->usuario_model->usuariosIns();

            if ($result) {
               $this->enviar_email('registro', 'luiggichirinos_p@outlook.com', $this->input->post('txt_ins_user_clave'));
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

    function getUserPermisos() {
        $id_user = $this->input->post('id_usuario');
        $this->usuario_model->getDatosUsuario(array('LIST-PERSON-POR-CODE-PERSONA', $id_user, ''));
        $data["Opciones"] = $this->permisos_model->permisosQry(Array('LISTAR-PERMISOS-USER', $id_user, ''));
        $data["code_user"] = $id_user;
        $data["nombreuser"] = $this->usuario_model->getPerApellidos()." ".$this->usuario_model->getPerNombres();
        $this->load->view('usuarios/permisos/panel_view', $data);
    }
    
    function usuariosUpd($nPerID) {
        $this->form_validation->set_rules('txt_upd_user_nombres', 'nombres', '|trim|required');
        $this->form_validation->set_rules('txt_upd_user_apellidos', 'apellidos', '|trim|required');
        $this->form_validation->set_rules('txt_upd_user_email', 'email', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');

        if ($this->form_validation->run() == true) {
            $this->usuario_model->setPerId($nPerID);
            $this->usuario_model->setPerNombres($this->input->post('txt_upd_user_nombres'));
            $this->usuario_model->setPerApellidos($this->input->post('txt_upd_user_apellidos'));
            $this->usuario_model->setPerEmail($this->input->post('txt_upd_user_email'));
            
            $result = $this->usuario_model->usuariosUpd();

            if ($result) {
               echo 1;
            } else {
                echo 0;
            }
        } else {
            echo "Error de validacion";
        }
    }

    function usuariosDel($nUsuID) {
        $this->usuario_model->getDatosUsuario(array('LIST-PERSON-POR-CODE-PERSONA', $nUsuID, ''));

        if ($this->usuario_model->getUsuEstado() == "H") {
            $estado = 'I';
        } else {
            $estado = 'H';
        }

        $query = $this->usuario_model->usuariosDel(array('DEL-USUARIOS', $nUsuID, $estado));
        if ($query) {
            echo "1";
        } else {
            echo "2";
        }
    }
    
    function enviar_email($accion, $email, $clave) {

        //configuracion para gmail
        $smtp_user = 'soporte@solocanchas.com';
        $smtp_clave = 'solo12345';
        $identificacion = 'Soporte SoloCanchas.';

        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'www.solocanchas.com',
            'smtp_port' => 25,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_clave,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $this->email->initialize($configGmail);

        if ($accion == "registro") {
            $asunto = 'SOLO CANCHAS. - REGISTRO DE NUEVO USUARIO';
            $body_mensaje = '<p style="text-align:justify;padding:5px 8px 5px 8px;">
                    Se ha generado una nueva clave de acceso a la Intranet. Tu nueva clave es 
                    &nbsp;' . $clave . '</p>';
        } 

        $this->email->from($smtp_user, $identificacion);
        $this->email->to($email);
        $this->email->subject($asunto);

        $estilo_css = '<style type="text/css">a {color: #003399;background-color: transparent;font-weight: normal;}h1 {color: #444;background-color: transparent;font-size: 24px;font-weight: bold;}code {font-family: Consolas, Monaco, Courier New, Courier, monospace;font-size: 12px;background-color: #f9f9f9;border: 1px solid #D0D0D0;color: #002166;display: block;margin: 14px 0 14px 0;padding: 12px 10px 12px 10px;}#body{margin: 0 15px 0 15px;}p.footer{text-align: right;font-size: 11px;border-top: 1px solid #D0D0D0;line-height: 32px;padding: 0 10px 0 10px;margin: 20px 0 0 0;}#container{width: 800px;margin: auto;border: 1px solid #D0D0D0;-webkit-box-shadow: 0 0 8px #D0D0D0;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;}#container img{float: left;margin: 5px 10px 0px 10px;width: 54px;height: 65px;}</style >';
        $header_mensaje = '';

        $this->email->message($estilo_css . $header_mensaje . $body_mensaje);

        if ($this->email->send()) {
            echo "1";
        } else {
            echo $this->email->print_debugger();
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */