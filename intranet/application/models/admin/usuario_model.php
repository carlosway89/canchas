<?php

require_once('persona_model.php');

class usuario_model extends Persona_model {

    private $usuID;
    private $usuNick;
    private $usuClave;
    private $usuTipo;
    private $usuFechaRegistro;
    private $usuEstado;

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

    public function getUsuTipo() {
        return $this->usuTipo;
    }

    public function setUsuTipo($usuTipo) {
        $this->usuTipo = $usuTipo;
    }

    public function getUsuFechaRegistro() {
        return $this->usuFechaRegistro;
    }

    public function setUsuFechaRegistro($usuFechaRegistro) {
        $this->usuFechaRegistro = $usuFechaRegistro;
    }

    public function getUsuEstado() {
        return $this->usuEstado;
    }

    public function setUsuEstado($usuEstado) {
        $this->usuEstado = $usuEstado;
    }

    public function autentication() {
        $parametros = array(
            $this->getUsuNick(),
            $this->getUsuClave()
        );

        $query = $this->db->query("CALL USP_GEN_S_VALIDAR_USUARIO(?,?)", $parametros);
        $this->db->close();
        if (count($query) > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function usuariosQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PERSONA (?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function usuariosIns() {
        $parametros = array(
            'INS-USUARIOS',
            $this->getPerNombres(),
            $this->getPerApellidos(),
            $this->getPerEmail(),
            md5($this->getUsuClave()),
        );

        $query = $this->db->query("CALL USP_GEN_I_USUARIOS(?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function usuariosUpd() {
        $parametros = array(
            'UPD-USUARIOS',
            $this->getPerId(),
            $this->getPerNombres(),
            $this->getPerApellidos(),
            $this->getPerEmail()
        );

        $query = $this->db->query("CALL USP_GEN_U_USUARIOS(?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function getDatosUsuario($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_PERSONA(?,?,?)", $parametros);
        $this->db->close();

        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setPerId($row->nPerID);
            $this->setPerNombres($row->cPerNombres);
            $this->setPerApellidos($row->cPerApellidos);
            $this->setPerEmail($row->Correo);
            $this->setUsuID($row->nUsuID);
            $this->setUsuEstado($row->cUsuEstado);
            $this->setUsuTipo($row->cUsuTipo);
            return $row;
        } else {
            return null;
        }
    }

    function usuariosDel($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?)", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function usuarioOpcionesDel($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?)", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function usuariosUpdClave() {
        $parametros = array(
            'UPD_CLAVE_USUARIO',
            $this->getUsuID(),
            md5($this->getUsuClave()),
        );

        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

//    function activar_cuenta($id_user) {
//        $parametros = array(
//            'ACTIVAR-CUENTA',
//            $id_user,
//            ''
//        );
//
//        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES(?,?,?)", $parametros);
//        $this->db->close();
//        if ($query) {
//            return true;
//        } else {
//            return false;
//        }
//    }

}