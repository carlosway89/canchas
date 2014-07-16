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

    function usuarioIns() {
        $parametros = array(
            $this->getPerNombres(),
            $this->getPerFechaNacimiento(),
            $this->getPerSexo(),
            $this->getPerTelefono(),
            $this->getPerCelular(),
            $this->getPerEmail(),
            $this->getPerFacebook(),
            $this->getPerSkype(),
            $this->getPerArea(),
            $this->getPerCargo(),
            $this->getUsuNick(),
            md5($this->getUsuClave()),
        );

        $query = $this->db->query("CALL USP_GEN_I_PERSONA(?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);

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
            $this->setPerEmail($row->Correo);
            $this->setUsuID($row->nUsuID);
            $this->setUsuEstado($row->cUsuEstado);
            $this->setUsuTipo($row->cUsuTipo);
            return $row;
        } else {
            return null;
        }
    }

    function getDataUserCreado($nick_user) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?)", array('USUARIO-CREADO', $nick_user, ''));
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setUsuNick($row->cUsuNick);
            $this->setUsuClave($row->cUsuClave);
            $this->setUsuID($row->nUsuID);
            return $row;
        } else {
            return null;
        }
    }

    function usuariosQry($Parametros) {
        if ($Parametros['criterio'] <> '') {
            $query = $this->db->query("CALL USP_GEN_S_PERSONA (?,?,?,?)", $Parametros);
        } else {
            $query = $this->db->query("CALL USP_GEN_S_PERSONA (?,?,?,?)", array('LISTAR-PERSONAS-CRITERIO',$Parametros["idioma"], '', ''));
        }
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function usuarioDel($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?,?)", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    function usuarioOpcionesDel($parametros) {
        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES (?,?,?,?)", $parametros);

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

    function activar_cuenta($id_user) {
        $parametros = array(
            'ACTIVAR-CUENTA',
            $id_user,
            ''
        );

        $query = $this->db->query("CALL USP_GEN_S_USUARIOS_OPCIONES(?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

}