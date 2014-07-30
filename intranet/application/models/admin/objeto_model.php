<?php
require_once('menu_aplicacion_model.php');

class Objeto_model extends Menu_Aplicacion_model {

    //DECLARACION DE VARIABLES
    private $nObjId = '';
    private $cObjNombre = '';
    private $cObjNombreArchivo = '';
    private $nObjIdPadre = '';
    private $bObjEliminado = '';
    private $bObjTipo = '';

    //CONSTRUCTOR DE LA CLASE
    function __construct() {
        parent::__construct();
    }

    function set_nObjId($nObjId) {
        $this->nObjId = $nObjId;
    }

    function set_cObjNombre($cObjNombre) {
        $this->cObjNombre = $cObjNombre;
    }

    function set_cObjNombreArchivo($cObjNombreArchivo) {
        $this->cObjNombreArchivo = $cObjNombreArchivo;
    }

    function set_nObjIdPadre($nObjIdPadre) {
        $this->nObjIdPadre = $nObjIdPadre;
    }

    function set_bObjEliminado($bObjEliminado) {
        $this->bObjEliminado = $bObjEliminado;
    }

    function set_bObjTipo($bObjTipo) {
        $this->bObjTipo = $bObjTipo;
    }

    function get_nObjId() {
        return $this->nObjId;
    }

    function get_cObjNombre() {
        return $this->cObjNombre;
    }

    function get_cObjNombreArchivo() {
        return $this->cObjNombreArchivo;
    }

    function get_nObjIdPadre() {
        return $this->nObjIdPadre;
    }

    function get_bObjEliminado() {
        return $this->bObjEliminado;
    }

    function get_bObjTipo() {
        return $this->bObjTipo;
    }
   
    // LISTADO DE LOS MÓDULOS DE APLICACIÓN
    function listaMenuOpciones2() {
        $resultado = array();
        $ul = "";
        $active = "";
        $opciones = "";
        $url = $this->session->userdata('url');
        
        $query = $this->db->query("SELECT * FROM aplicacion WHERE cAplEstado='H'");
        $this->db->close();
        
        foreach ($query->result() as $row) {
            $opt = $this->listaSubMenus('W', $row->nAplID);
            if ($opt != null) {
                $active = "";
                $ul = 'class="submenu"';
                $array = array();
                foreach ($opt->result() as $opcion) {
                    if ($url) {
                        if ($opcion->cOpdRuta == $url) {
                            $active = "class=\"active\"";
                            $opciones = 'class="active"';
                        } else {
                            $opciones = '';
                        }
                    }
                    $array[] = array(
                        "value" => $opcion->cOpcDescripcion,
                        "url" => $opcion->cOpdRuta,
                        "iconoso" => $opcion->cOpcIcono,
                        "li" => $opciones
                    );
                }

                $resultado[] = array(
                    'menu' => $row->cAplDescripcion,
                    'datos' => $array,
                    'icon' => $row->cAplIcono,
                    'active' => $active,
                    'ul' => $ul);
            }
        }
        return $resultado;
        

    }

    //LISTA DE OPCIONES QUE CONTIENEN LOS MÓDULOS DE LA APLICACIÓN
    function listaSubMenus($plataforma, $idaplicacion) {
        $idusuario = $this->session->userdata('nUsuID');
        $query = $this->db->query("CALL USP_GEN_S_MENU (?,?,?)", array($idusuario, $idaplicacion, $plataforma));
        $this->db->close();
        if ($query) {
            if ($query->num_rows() > 0) {
                return $query;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

}

?>