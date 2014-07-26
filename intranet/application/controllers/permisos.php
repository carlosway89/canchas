<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Permisos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/permisos_model');
        $this->load->model('admin/usuario_model');
    }

    function index() {
        $this->load->view("admin/permisos/panel_view");
    }

    function permisosIns() {
        $nUsuID = $this->input->post("hid_ins_usu_codigo");
        
        $delete = $this->usuario_model->usuarioOpcionesDel(array('DELETE-USUARIOS-OPCIONES','', $nUsuID, ''));

        if ($delete) {
            $Data = $this->input->post("arrayopciones");
            $values = array();
            $campos =
                    array(
                        'nUsuID',
                        'nOpcID',
                        //'nParIDSede',
                        'cUsoEstado'
            );
            for ($i = 0; $i < count($Data); $i++) {
                $values[$i] = array
                    (
                    $nUsuID,
                    $Data[$i],
                   // 13,
                    'H'
                );
            }
            
            $result = $this->loaders->generaconsulta("INS", "usuarios_opciones", $campos, $values);

            if ($result) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 2;
        }
    }
}

