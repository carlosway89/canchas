<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Acceso extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('admin/usuario_model');
        $this->load->model('admin/persona_model');
        
    }

    function index() {
        $this->_Esta_logeado();
        $data['title'] = '.: SoloCanchas - Acceso a la Intranet :.';
        $this->load->view("login/panel_view", $data);
    }

    function login() {
        $this->_Esta_logeado();
        $data['title'] = '.: SoloCanchas - Acceso a la Intranet :.';
        $this->load->view("login/panel_view", $data);
    }

    function logout() {
        $this->session->sess_destroy();
        redirect("acceso/login");
    }

//    function user_registration_from_login() {
//        $this->form_validation->set_rules('txt_ins_usu_email', 'email', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_usu_usuario', 'usuario', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_usu_password', 'contraseña', '|trim|required');
//        $this->form_validation->set_rules('txt_ins_usu_repeatpass', 'repetir contraseña', '|trim|required');
//
//        $this->form_validation->set_message('required', 'El campo %s es requerido');
//
//        if ($this->form_validation->run() == true) {
//            $this->persona_model->setPerEmail($this->input->post('txt_ins_usu_email'));
//            $this->usuario_model->setUsuNick($this->input->post('txt_ins_usu_usuario'));
//            $this->usuario_model->setUsuClave($this->input->post('txt_ins_usu_password'));
//            $resul = $this->usuario_model->user_registration();
//
//            print_r($resul);
//            exit();
//
//            if ($resul) {
//                echo 1;
//                exit;
//            } else {
//                echo 0;
//                exit;
//            }
//        } else {
//            $this->index();
//        }
//    }

    function autentication() {
        $this->form_validation->set_rules('txt_ins_login_user', 'Nick', 'required|trim');
        $this->form_validation->set_rules('txt_ins_login_clave', 'clave', 'required|trim|md5');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {


//        print_r($this->input->post('txt_ins_login_user'));
//        exit();


            $user = $this->input->post('txt_ins_login_user');
            $clave = $this->input->post('txt_ins_login_clave');
            $this->usuario_model->setUsuNick($user);
            $this->usuario_model->setUsuClave($clave);

            $login = $this->usuario_model->autentication();

            if ($login) {
                $data = array(
                    'esta_logeado' => true,
                    'usuario' => $login[0]->cUsuNick,
                    'Nombres' => $login[0]->cPerNombres,
                    'Apellidos' => $login[0]->cPerApellidos,
                    'nPerID' => $login[0]->nPerID,
                    'nUsuID' => $login[0]->nUsuID,
                    'dedonde' => 'intranet',
                    'tipo' =>$login[0]->cUsuTipo
                );
                $this->session->set_userdata($data);
                echo "1";
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
    }

//    function activar_cuenta($id_user) {
//        $query = $this->usuario_model->activar_cuenta($id_user);
//        if ($query) {
//            redirect("usuario/login");
//        }
//    }

    function recuperar_clave() {
        $email = $this->input->post('txt_upd_recu_clave');

        // OBTENER DATOS DEL USUARIO (ID del Usuario)
        $this->usuario_model->getDatosUsuario(array('LIST-PERSON-POR-VALOR-CRITERIO', $email, '9'));

        // GENERAR Y ACTUALIZAR NUEVA CLAVE
        $new_clave = rand(1000000, 9999999);

        $this->usuario_model->setUsuClave($new_clave);
        $this->usuario_model->usuariosUpdClave();

        // ENVIAR EMAIL
        $this->enviar_email("recuperar", $email, $new_clave);
    }

    function enviar_email($accion, $email, $clave) {

        //configuracion para gmail
        // $smtp_user = 'gsavtecno@gmail.com';
        // $smtp_clave = 'solo12345';
        // $identificacion = 'Soporte SoloCanchas.';

        // $configGmail = array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'smtp.gmail.com',
        //     'smtp_port' => 587,
        //     'smtp_user' => $smtp_user,
        //     'smtp_pass' => $smtp_clave,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // );

        // $this->email->initialize($configGmail);

        if ($accion == "registro") {
            $asunto = 'SOLO CANCHAS. - REGISTRO DE NUEVO USUARIO';
        } else if ($accion == "actualizacion") {
            $asunto = 'SOLO CANCHAS. - ACTUALIZACIÓN DE CONTRASEÑA';
        } else {
            $new_clave = $clave;
            $asunto = 'SOLO CANCHAS. - RECUPERAR CONTRASEÑA';
            $body_mensaje = '<p style="text-align:justify;padding:5px 8px 5px 8px;">
                    Se ha generado una nueva clave de acceso a la Intranet. Tu nueva clave es 
                    &nbsp;' . $new_clave . '</p>';
        }
        // $this->email->SMTPSecure = 'tls';
        // $this->email->from($smtp_user, $identificacion);
        // $this->email->to($email);
        // $this->email->subject($asunto);

        // $estilo_css = '<style type="text/css">a {color: #003399;background-color: transparent;font-weight: normal;}h1 {color: #444;background-color: transparent;font-size: 24px;font-weight: bold;}code {font-family: Consolas, Monaco, Courier New, Courier, monospace;font-size: 12px;background-color: #f9f9f9;border: 1px solid #D0D0D0;color: #002166;display: block;margin: 14px 0 14px 0;padding: 12px 10px 12px 10px;}#body{margin: 0 15px 0 15px;}p.footer{text-align: right;font-size: 11px;border-top: 1px solid #D0D0D0;line-height: 32px;padding: 0 10px 0 10px;margin: 20px 0 0 0;}#container{width: 800px;margin: auto;border: 1px solid #D0D0D0;-webkit-box-shadow: 0 0 8px #D0D0D0;font: 13px/20px normal Helvetica, Arial, sans-serif;color: #4F5155;}#container img{float: left;margin: 5px 10px 0px 10px;width: 54px;height: 65px;}</style >';
        // $header_mensaje = '';

        // $this->email->message($estilo_css . $header_mensaje . $body_mensaje);

        // if ($this->email->send()) {
        //     echo "1";
        // } else {
        //     echo $this->email->print_debugger();
        // }
        ini_set("sendmail_from", "soporte@solocanchas.com");

        $message = $body_mensaje;

        $headers = $asunto.
        "MIME-Version: 1.0\r\n" .
        "Content-Type: text/html; charset=utf-8\r\n" .
        "Content-Transfer-Encoding: 8bit\r\n\r\n";

        mail($email, $asunto, $message, $headers);

        echo "1";
    }

    function usuarioValidacion() {
        $accion = $this->input->post('accion');
        $criterio = $this->input->post('criterio');
        $tipo = $this->input->post('tipo');
        $result = $this->loaders->validacionDato($accion, '', $criterio, $tipo, '', '');

        if ($result == "true") {
            echo "false";
        } else {
            echo "true";
        }
    }
    function _Esta_logeado() {

        $nPerID = $this->session->userdata('nPerID');
        if ( $nPerID != '') {
            redirect('manage');
        }
    }

}

