<?php

class Comentarios_Canchas_model extends CI_Model {

    private $ComcaID;
    private $CanID;
    private $ComcaNombrePersona;
    private $ComcaTexto;
    private $CanLatitud;
    private $ComcaPadreID;
    private $ComcaFechaRegistro;
    private $ComcaEstado;


    function __construct() {
        parent::__construct();
    }
    
    public function getComcaID() {
        return $this->ComcaID;
    }

    public function setComcaID($ComcaID) {
        $this->ComcaID = $ComcaID;
    }

    public function getCanID() {
        return $this->CanID;
    }

    public function setCanID($CanID) {
        $this->CanID = $CanID;
    }

    public function getComcaNombrePersona() {
        return $this->ComcaNombrePersona;
    }

    public function setComcaNombrePersona($ComcaNombrePersona) {
        $this->ComcaNombrePersona = $ComcaNombrePersona;
    }

    public function getComcaTexto() {
        return $this->ComcaTexto;
    }

    public function setComcaTexto($ComcaTexto) {
        $this->ComcaTexto = $ComcaTexto;
    }

    public function getCanLatitud() {
        return $this->CanLatitud;
    }

    public function setCanLatitud($CanLatitud) {
        $this->CanLatitud = $CanLatitud;
    }

    public function getComcaPadreID() {
        return $this->ComcaPadreID;
    }

    public function setComcaPadreID($ComcaPadreID) {
        $this->ComcaPadreID = $ComcaPadreID;
    }

    public function getComcaFechaRegistro() {
        return $this->ComcaFechaRegistro;
    }

    public function setComcaFechaRegistro($ComcaFechaRegistro) {
        $this->ComcaFechaRegistro = $ComcaFechaRegistro;
    }

    public function getComcaEstado() {
        return $this->ComcaEstado;
    }

    public function setComcaEstado($ComcaEstado) {
        $this->ComcaEstado = $ComcaEstado;
    }

    
    function comentarios_canchasQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_COMENTARIOS_CANCHAS (?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
}

?>