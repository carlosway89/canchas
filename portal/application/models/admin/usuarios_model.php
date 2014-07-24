<?php

class Usuarios_model extends CI_Model {

    private $PerID;
    private $UsuID;
    private $Nombres;
    private $Apellidos;
    private $Email;
    private $Usuario;
    private $Contraseña;
    private $Estado;

    function __construct() {
        parent::__construct();
    }
    
    public function getPerID() {
        return $this->PerID;
    }

    public function setPerID($PerID) {
        $this->PerID = $PerID;
    }

    public function getUsuID() {
        return $this->UsuID;
    }

    public function setUsuID($UsuID) {
        $this->UsuID = $UsuID;
    }

    public function getNombres() {
        return $this->Nombres;
    }

    public function setNombres($Nombres) {
        $this->Nombres = $Nombres;
    }

    public function getApellidos() {
        return $this->Apellidos;
    }

    public function setApellidos($Apellidos) {
        $this->Apellidos = $Apellidos;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($Email) {
        $this->Email = $Email;
    }

    public function getUsuario() {
        return $this->Usuario;
    }

    public function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    public function getContraseña() {
        return $this->Contraseña;
    }

    public function setContraseña($Contraseña) {
        $this->Contraseña = $Contraseña;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function setEstado($Estado) {
        $this->Estado = $Estado;
    }

    
        
    function usuariosIns() {
        $parametros = array(
            'INS-USUARIOS',
            $this->getNombres(),
            $this->getApellidos(),
            $this->getEmail(),
            md5($this->getContraseña()),
        );

        $query = $this->db->query("CALL USP_GEN_I_USUARIOS(?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
  
}

?>