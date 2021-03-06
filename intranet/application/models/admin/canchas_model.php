<?php

class Canchas_model extends CI_Model {

    private $CanID;
    private $CanNombre;
    private $CanDescripcion;
    private $CanLatitud;
    private $CanLongitud;
    private $CanDepartamento;
    private $CanProvincia;
    private $CanDistrito;
    private $CanFechaRegistro;
    private $CanDireccion;
    private $CanTelefono;
    private $CanNroCanchas;
    private $CanFacebook;
    private $CanEmail;
    private $CanSitioWeb;
    private $CanVisitas;
    private $CanFotoPortada;
    private $CanEstado;
    private $CanEnlace;

    function __construct() {
        parent::__construct();
    }

    public function getCanID() {
        return $this->CanID;
    }

    public function setCanID($CanID) {
        $this->CanID = $CanID;
    }

    public function getCanNombre() {
        return $this->CanNombre;
    }

    public function setCanNombre($CanNombre) {
        $this->CanNombre = $CanNombre;
    }

    public function getCanDescripcion() {
        return $this->CanDescripcion;
    }

    public function setCanDescripcion($CanDescripcion) {
        $this->CanDescripcion = $CanDescripcion;
    }

    public function getCanLatitud() {
        return $this->CanLatitud;
    }

    public function setCanLatitud($CanLatitud) {
        $this->CanLatitud = $CanLatitud;
    }

    public function getCanLongitud() {
        return $this->CanLongitud;
    }

    public function setCanLongitud($CanLongitud) {
        $this->CanLongitud = $CanLongitud;
    }

    public function getCanDepartamento() {
        return $this->CanDepartamento;
    }

    public function setCanDepartamento($CanDepartamento) {
        $this->CanDepartamento = $CanDepartamento;
    }

    public function getCanProvincia() {
        return $this->CanProvincia;
    }

    public function setCanProvincia($CanProvincia) {
        $this->CanProvincia = $CanProvincia;
    }

    public function getCanDistrito() {
        return $this->CanDistrito;
    }

    public function setCanDistrito($CanDistrito) {
        $this->CanDistrito = $CanDistrito;
    }

    public function getCanFechaRegistro() {
        return $this->CanFechaRegistro;
    }

    public function setCanFechaRegistro($CanFechaRegistro) {
        $this->CanFechaRegistro = $CanFechaRegistro;
    }

    public function getCanDireccion() {
        return $this->CanDireccion;
    }

    public function setCanDireccion($CanDireccion) {
        $this->CanDireccion = $CanDireccion;
    }

    public function getCanTelefono() {
        return $this->CanTelefono;
    }

    public function setCanTelefono($CanTelefono) {
        $this->CanTelefono = $CanTelefono;
    }

    public function getCanNroCanchas() {
        return $this->CanNroCanchas;
    }

    public function setCanNroCanchas($CanNroCanchas) {
        $this->CanNroCanchas = $CanNroCanchas;
    }

    public function getCanFacebook() {
        return $this->CanFacebook;
    }

    public function setCanFacebook($CanFacebook) {
        $this->CanFacebook = $CanFacebook;
    }

    public function getCanEmail() {
        return $this->CanEmail;
    }

    public function setCanEmail($CanEmail) {
        $this->CanEmail = $CanEmail;
    }

    public function getCanSitioWeb() {
        return $this->CanSitioWeb;
    }

    public function setCanSitioWeb($CanSitioWeb) {
        $this->CanSitioWeb = $CanSitioWeb;
    }

    public function getCanVisitas() {
        return $this->CanVisitas;
    }

    public function setCanVisitas($CanVisitas) {
        $this->CanVisitas = $CanVisitas;
    }

    public function getCanFotoPortada() {
        return $this->CanFotoPortada;
    }

    public function setCanFotoPortada($CanFotoPortada) {
        $this->CanFotoPortada = $CanFotoPortada;
    }

    public function getCanEstado() {
        return $this->CanEstado;
    }

    public function setCanEstado($CanEstado) {
        $this->CanEstado = $CanEstado;
    }
    public function setCanEnlace($CanEnlace){
        $this->CanEnlace=$CanEnlace;
     }

     public function getCanEnlace(){
        return $this->CanEnlace;
     }
    
    function canchasIns() {
        $parametros = array(
            'INS-CANCHAS',
            $this->getCanNombre(),
            $this->getCanDescripcion(),
            $this->getCanLatitud(),
            $this->getCanLongitud(),
            $this->getCanDepartamento(),
            $this->getCanProvincia(),
            $this->getCanDistrito(),
            $this->getCanDireccion(),
            $this->getCanTelefono(),
            $this->getCanFacebook(),
            $this->getCanEmail(),
            $this->getCanSitioWeb(),
            $this->getCanNroCanchas(),
            $this->getCanFotoPortada(),
            $this->getCanEnlace()
        );

        $query = $this->db->query("CALL USP_GEN_I_CANCHAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function canchasUpd() {
        $parametros = array(
            'UPD-CANCHAS',
            $this->getCanID(),
            $this->getCanNombre(),
            $this->getCanDescripcion(),
            $this->getCanLatitud(),
            $this->getCanLongitud(),
            $this->getCanDepartamento(),
            $this->getCanProvincia(),
            $this->getCanDistrito(),
            $this->getCanDireccion(),
            $this->getCanTelefono(),
            $this->getCanFacebook(),
            $this->getCanEmail(),
            $this->getCanSitioWeb(),
            $this->getCanNroCanchas(),
            $this->getCanFotoPortada(),
            $this->getCanEnlace()
        );

        $query = $this->db->query("CALL USP_GEN_U_CANCHAS(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);
        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    function canchasQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_CANCHAS (?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function canchasQryOtros($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_CANCHAS (?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }

    function canchasGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_CANCHAS (?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            $this->setCanID($row->nCanID);
            $this->setCanNombre($row->cCanNombre);
            $this->setCanDescripcion($row->cCanDescripcion);
            $this->setCanLatitud($row->cCanLatitud);
            $this->setCanLongitud($row->cCanLongitud);
            $this->setCanDepartamento($row->id_depa);
            $this->setCanProvincia($row->id_prov);
            $this->setCanDistrito($row->id_dis);
            $this->setCanFechaRegistro($row->fecha_registro);
            $this->setCanDireccion($row->direccion);
            $this->setCanTelefono($row->telefono);
            $this->setCanNroCanchas($row->nro_canchas);
            $this->setCanFacebook($row->facebook);
            $this->setCanEmail($row->email);
            $this->setCanSitioWeb($row->sitio_web);
            $this->setCanVisitas($row->nCanVisitas);
            $this->setCanFotoPortada($row->cCanFotoPortada);
            $this->setCanEstado($row->cCanEstado);
            $this->setCanEnlace($row->nCanEnlace);
            return $row;
        } else {
            return null;
        }
    }
    
    function canchasDel($parametros) {
        $query = $this->db->query("CALL USP_GEN_U_CANCHAS (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", $parametros);

        $this->db->close();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    function canchasGaleria($Parametros){
        $query = $this->db->query("CALL USP_GEN_S_CANCHAS (?,?,?,?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }

    }
}

?>