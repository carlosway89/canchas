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
        $this->load->model('codegen_model', '', TRUE);

        
    }

    public function index() {
        
        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Usuarios'));

        if(!$acceso)
            redirect(base_url().'manage');


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
               $this->enviar_email('registro', $this->input->post('txt_ins_user_email'), $this->input->post('txt_ins_user_clave'));
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
        
        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Usuarios'));

        if(!$acceso)
            redirect(base_url().'manage');

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

        

        if ($accion == "registro") {
            $asunto = 'SOLO CANCHAS. - REGISTRO DE NUEVO USUARIO';
            $body_mensaje = '<p style="text-align:justify;padding:5px 8px 5px 8px;">
                    Se ha generado una nueva usuario de acceso a la Intranet. <br> <b>Usuario:</b>'.$email.' <br><b>clave de usuario:</b>&nbsp;' . $clave . '</p>';
        } 
        

        ini_set("sendmail_from", "soporte@solocanchas.com");

        $message = $body_mensaje;

        $headers = "SOLO CANCHAS - REGISTRO DE NUEVO USUARIO".
        "MIME-Version: 1.0\r\n" .
        "Content-Type: text/html; charset=utf-8\r\n" .
        "Content-Transfer-Encoding: 8bit\r\n\r\n";

        mail($email, $asunto, $message, $headers);

        echo "1";
    }
    function editar(){


        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Usuarios'));

        if(!$acceso)
            redirect(base_url().'manage');
        else{
            $ID = $this->uri->segment(3);
            $data['main_content'] = 'usuarios/editar_usuario';
            $data['title'] = '.: Solo Canchas - Módulo de Actualización de Datos :.';
            $data['menu_home'] = 'intranet';
            $data['breadcrumbs'] = 'Módulo de Actualización de Datos';
            
            $this->usuario_model->getDatosUsuario(array('LIST-PERSON-POR-CODE-PERSONA', $ID, ''));
            $data["nPerID"] = $this->usuario_model->getPerId(); 
            $data["NombresUser"] = $this->usuario_model->getPerNombres();
            $data["ApellidosUser"] = $this->usuario_model->getPerApellidos();
            $data["EmailUser"] = $this->usuario_model->getPerEmail();

            $this->load->view('master/template_view', $data);

        }

        

    }
    function usuariosUpdSuper($nPerID) {
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
            $password=$this->input->post('txt_upd_password');
            if ($password!='') {
                $data = array(
                    'cUsuNick' => $this->input->post('txt_upd_user_email'),
                    'cUsuClave' => md5($this->input->post('txt_upd_password'))
                );
            }
            else{
                $data = array(
                    'cUsuNick' => $this->input->post('txt_upd_user_email')
                );

            }            
           
            if ($this->codegen_model->edit('usuarios',$data,'nPerID',$nPerID) == TRUE)
            {
                if ($result) {
                   echo 1;
                } else {
                    echo 0;
                }
            }
            
        } else {
            echo "Error de validacion";
        }
    }

    function eliminar(){

        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Usuarios'));

        if(!$acceso)
            redirect(base_url().'manage');

        else{
            $ID = $this->uri->segment(3);
            
            if ($this->codegen_model->delete('usuarios', 'nPerID', $ID)) {
                if ($this->codegen_model->delete('persona', 'nPerID', $ID)) {
                    $this->codegen_model->delete('persona_detalle', 'nPerID', $ID);
                    redirect(base_url() . 'usuarios');                    
                }
            }
            else{
                echo 2;
            }

            

        }
        
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */