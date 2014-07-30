<?php

class Ubigeo_model extends CI_Model {

    private $_UbiID;
    private $_UbiDepartamento;
    private $_UbiProvincia;
    private $_UbiDistrito;
    private $_UbiDescripcion;
    private $_UbiEstado;

    function __construct() {
        parent::__construct();
    }

    public function getUbiID() {
        return $this->_UbiID;
    }

    public function setUbiID($UbiID) {
        $this->_UbiID = $UbiID;
    }

    public function getUbiDepartamento() {
        return $this->_UbiDepartamento;
    }

    public function setUbiDepartamento($UbiDepartamento) {
        $this->_UbiDepartamento = $UbiDepartamento;
    }

    public function getUbiProvincia() {
        return $this->_UbiProvincia;
    }

    public function setUbiProvincia($UbiProvincia) {
        $this->_UbiProvincia = $UbiProvincia;
    }

    public function getUbiDistrito() {
        return $this->_UbiDistrito;
    }

    public function setUbiDistrito($UbiDistrito) {
        $this->_UbiDistrito = $UbiDistrito;
    }

    public function getUbiDescripcion() {
        return $this->_UbiDescripcion;
    }

    public function setUbiDescripcion($UbiDescripcion) {
        $this->_UbiDescripcion = $UbiDescripcion;
    }

    public function getUbiEstado() {
        return $this->_UbiEstado;
    }

    public function setUbiEstado($UbiEstado) {
        $this->_UbiEstado = $UbiEstado;
    }
    
    function ubigeoQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_UBIGEO (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    // FUNCION QUE GENERA LOS COMCOS PARA LA ACTUALIZACION DE DATOS DEL USUARIO
    function qryubigeos($accion, $idDepa, $idProv, $tipo_accion, $mantenedor, $nom_mantenedor) {
        $Parametros = array($accion, $idDepa, $idProv);
        $query = $this->db->query("CALL USP_GEN_S_UBIGEO (?,?,?)", $Parametros);

        $this->db->close();
        if ($query->num_rows() > 0) {
            $array = $query->result();
            $cbo_ubigeo[''] = "Seleccionar " . ucwords(substr($nom_mantenedor, 0, -1)) . "";
            if ($nom_mantenedor == "provincias") {
                foreach ($array as $Ubigeo) {
                    $cbo_ubigeo[$Ubigeo->nUbiProvincia] = ucwords(strtolower($Ubigeo->cUbiDescripcion));
                }

                echo form_dropdown('cbo_'.$tipo_accion.'_'.$mantenedor.'_'.$nom_mantenedor, $cbo_ubigeo,'', 'id="cbo_'.$tipo_accion.'_'.$mantenedor.'_'.$nom_mantenedor . '" class="col-sm-4" required = "required"');

            } else if ($nom_mantenedor == "distritos") {
                foreach ($array as $Ubigeo) {
                    $cbo_ubigeo[$Ubigeo->nUbiID] = ucwords(strtolower($Ubigeo->cUbiDescripcion));
                }

                echo form_dropdown('cbo_'.$tipo_accion.'_'.$mantenedor.'_'.$nom_mantenedor, $cbo_ubigeo, '', 'id="cbo_'.$tipo_accion.'_'.$mantenedor.'_'.$nom_mantenedor . '" class="col-sm-4" required = "required"');
            }
        } else {
            $cbo_ubigeo[''] = "Seleccionar " . $nom_mantenedor . "";
            echo form_dropdown('cbo_' . $mantenedor . '_' . $tipo_accion . '_' . $nom_mantenedor, $cbo_ubigeo, '', 'id="cbo_'.$tipo_accion.'_'.$mantenedor.'_'.$nom_mantenedor . '"  class="col-sm-4" required = "required"');

        }
    }

}

?>