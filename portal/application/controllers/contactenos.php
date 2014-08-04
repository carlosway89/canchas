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

//    //configuracion para gmail
//    $smtp_user = 'soporte@solocanchas.com';
//    $smtp_clave = 'solo12345';
//    $identificacion = 'Soporte SoloCanchas.';
//
//    $configGmail = array(
//        'protocol' => 'smtp',
//        'smtp_host' => 'www.solocanchas.com',
//        'smtp_port' => 25,
//        'smtp_user' => $smtp_user,
//        'smtp_pass' => $smtp_clave,
//        'mailtype' => 'html',
//        'charset' => 'utf-8',
//        'newline' => "\r\n"
//    );
        //configuracion para gmail
        $smtp_user = 'luipa1303@gmail.com';
        $smtp_clave = 'lampard_lampard';
        $identificacion = 'Web Master Solo Canchas.';

        $configGmail = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => $smtp_user,
            'smtp_pass' => $smtp_clave,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $this->email->initialize($configGmail);


        $asunto = 'SOLO CANCHAS. - MENSAJE DE CONTACTO';
        $body_mensaje = "<b>".$nombres." ".$apellidos."</b>"." <br />te ha enviado desde su correo electronico <b>".$email."</b> el siguiente mensaje: <br /><br />".$message;


        $this->email->from($smtp_user, $identificacion);
        $this->email->to('luiggichirinos_p@outlook.com');
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