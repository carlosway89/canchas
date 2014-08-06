<?php

class permisos_model extends CI_Model {

    private $nUsoID;
    private $nUsuID;
    private $nOpcID;
    private $cUsoEstado;

    function __construct() {
        parent::__construct();
    }

    public function getNUsoID() {
        return $this->nUsoID;
    }

    public function setNUsoID($nUsoID) {
        $this->nUsoID = $nUsoID;
    }

    public function getNUsuID() {
        return $this->nUsuID;
    }

    public function setNUsuID($nUsuID) {
        $this->nUsuID = $nUsuID;
    }

    public function getNOpcID() {
        return $this->nOpcID;
    }

    public function setNOpcID($nOpcID) {
        $this->nOpcID = $nOpcID;
    }

    public function getCUsoEstado() {
        return $this->cUsoEstado;
    }

    public function setCUsoEstado($cUsoEstado) {
        $this->cUsoEstado = $cUsoEstado;
    }

    function permisosDel($Parameters) {
        $query = $this->db->query("CALL USP_GEN_D_USUARIOS_OPCIONES (?,?)", $Parameters);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function permisosQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    function permisos($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}

?>