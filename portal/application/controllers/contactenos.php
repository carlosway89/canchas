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

    function contactoIns() {
        $this->form_validation->set_rules('contact_firstname', 'nombre', '|trim|required');
        $this->form_validation->set_rules('contact_lastname', 'descripción', '|trim|required');
        $this->form_validation->set_rules('contact_email', 'email', '|trim|required');
        $this->form_validation->set_rules('contact_message', 'email', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == true) {
            $this->enviar_email();
        } else {
            echo "error de validación";
        }
    }

    function enviar_email() {

        $nombres = $this->input->post('contact_firstname');
        $apellidos = $this->input->post('contact_lastname');
        $email = $this->input->post('contact_email');
        $message = $this->input->post('contact_message');




        $asunto = 'SOLO CANCHAS. - MENSAJE DE CONTACTO';
        $body_mensaje = "<b>".$nombres." ".$apellidos."</b>"." <br />te ha enviado desde su correo electronico <b>".$email."</b> el siguiente mensaje: <br /><br />".$message;

        ini_set("sendmail_from", "soporte@solocanchas.com");

        $message = $body_mensaje;

        $headers = $asunto.
        "MIME-Version: 1.0\r\n" .
        "Content-Type: text/html; charset=utf-8\r\n" .
        "Content-Transfer-Encoding: 8bit\r\n\r\n";

        mail('soporte@solocanchas', $asunto, $message, $headers);

        echo "1";


    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */