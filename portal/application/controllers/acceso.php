<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Acceso extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('admin/usuarios_model');
        $this->load->model('admin/persona_model');
    }

    function logout() {
        $this->session->sess_destroy();
        redirect("inicio/");
    }

    function autentication() {
        $this->form_validation->set_rules('txt_ins_login_user', 'Nick', 'required|trim');
        $this->form_validation->set_rules('txt_ins_login_clave', 'clave', 'required|trim|md5');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $user = $this->input->post('txt_ins_login_user');
            $clave = $this->input->post('txt_ins_login_clave');
            $this->usuarios_model->setUsuNick($user);
            $this->usuarios_model->setUsuClave($clave);

            $login = $this->usuarios_model->autentication();

            if ($login) {
                $data = array(
                    'esta_logeado' => true,
                    'usuario' => $login[0]->cUsuNick,
                    'Nombres' => $login[0]->cPerNombres,
                    'Apellidos' => $login[0]->cPerApellidos,
                    'nPerID' => $login[0]->nPerID,
                    'nUsuID' => $login[0]->nUsuID,
                    'dedonde' => 'portal',
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
//        $query = $this->usuarios_model->activar_cuenta($id_user);
//        if ($query) {
//            redirect("usuario/login");
//        }
//    }

    function recuperar_clave() {
        $email = $this->input->post('txt_upd_recu_clave');

        // OBTENER DATOS DEL USUARIO (ID del Usuario)
        $this->usuarios_model->getDatosUsuario(array('LIST-PERSON-POR-VALOR-CRITERIO', $email, '9'));

        // GENERAR Y ACTUALIZAR NUEVA CLAVE
        $new_clave = rand(1000000, 9999999);

        $this->usuarios_model->setUsuClave($new_clave);
        $this->usuarios_model->usuariosUpdClave();

        // ENVIAR EMAIL
        $this->enviar_email("recuperar", $email, $new_clave);
    }

    function enviar_email($accion, $email, $clave) {



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
}

