<?php

class clave_model extends CI_Model {

    protected $usuID;
    protected $usuNick;
    protected $usuClave;
    protected $usuClaveRepeat;

    function __construct() {
        parent::__construct();
    }

    public function getUsuID() {
        return $this->usuID;
    }

    public function setUsuID($usuID) {
        $this->usuID = $usuID;
    }

    public function getUsuNick() {
        return $this->usuNick;
    }

    public function setUsuNick($usuNick) {
        $this->usuNick = $usuNick;
    }

    public function getUsuClave() {
        return $this->usuClave;
    }

    public function setUsuClave($usuClave) {
        $this->usuClave = $usuClave;
    }

    public function getUsuClaveRepeat() {
        return $this->usuClaveRepeat;
    }

    public function setUsuClaveRepeat($usuClaveRepeat) {
        $this->usuClaveRepeat = $usuClaveRepeat;
    }
    
    public function getClaveAnterior($cod_person,$usuario, $clave_anterior) {
        $parametros = array($cod_person,$usuario, $clave_anterior);
        $query = $this->db->query("CALL USP_GEN_S_USER_CLAVE(?,?,?)", $parametros);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

}

?>
