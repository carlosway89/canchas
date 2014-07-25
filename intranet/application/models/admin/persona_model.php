<?php

class Persona_model extends CI_Model {

    private $PerId = '';
    private $PerApellidos = '';
    private $PerNombres = '';
    private $PerEmpresa = '';
    private $PerFechaRegistro = '';
    private $PerEmail = '';
    private $PerEstado = '';

    function __construct() {
        parent::__construct();
    }

    public function getPerId() {
        return $this->PerId;
    }

    public function setPerId($PerId) {
        $this->PerId = $PerId;
    }

    public function getPerApellidos() {
        return $this->PerApellidos;
    }

    public function setPerApellidos($PerApellidos) {
        $this->PerApellidos = $PerApellidos;
    }

    public function getPerNombres() {
        return $this->PerNombres;
    }

    public function setPerNombres($PerNombres) {
        $this->PerNombres = $PerNombres;
    }

    public function getPerEmpresa() {
        return $this->PerEmpresa;
    }

    public function setPerEmpresa($PerEmpresa) {
        $this->PerEmpresa = $PerEmpresa;
    }

    public function getPerFechaRegistro() {
        return $this->PerFechaRegistro;
    }

    public function setPerFechaRegistro($PerFechaRegistro) {
        $this->PerFechaRegistro = $PerFechaRegistro;
    }

    public function getPerEmail() {
        return $this->PerEmail;
    }

    public function setPerEmail($PerEmail) {
        $this->PerEmail = $PerEmail;
    }

    public function getPerEstado() {
        return $this->PerEstado;
    }

    public function setPerEstado($PerEstado) {
        $this->PerEstado = $PerEstado;
    }

    function personaUpd() {
        $parametros = array(
            $this->getPerId(),
            $this->getPerNombres(),
            $this->getPerFechaNacimiento(),
            $this->getPerSexo(),
            $this->getPerTelefono(),
            $this->getPerCelular(),
            $this->getPerEmail(),
            $this->getPerFacebook(),
            $this->getPerSkype(),
            $this->getPerArea(),
            $this->getPerCargo()
        );

        $query = $this->db->query("CALL USP_GEN_UPD_PERSONA(?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function personaUploadFoto() {
        $parametros = array(
            $this->getPerId(),
            $this->getPerFoto()
        );

        $query = $this->db->query("CALL USP_GEN_UPD_PERSONA_FOTO(?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function personaGetFoto($nPerID) {
        $query = $this->db->query("CALL USP_GEN_S_PERSONA_FOTO(?)", $nPerID);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setPerFoto($row->cPerImgDescripcion);
            return $row;
        } else {
            return null;
        }
    }

}

?>
