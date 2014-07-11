<?php

class Noticias_Model extends CI_Model {

    private $NotiID;
    private $NotiTipoID;
    private $NotiTitulo;
    private $NotiSumilla;
    private $NotiDescripcion;
    private $NotiFechaRegistro;
    private $NotiFechaInicio;
    private $NotiFechaFinal;
    private $NotiLugar;
    private $NotiAutor;
    private $NotiFotoPortada;
    private $NotiNroVisitas;
    private $NotiEstado;


    function __construct() {
        parent::__construct();
    }
    
    public function getNotiID() {
        return $this->NotiID;
    }

    public function setNotiID($NotiID) {
        $this->NotiID = $NotiID;
    }

    public function getNotiTipoID() {
        return $this->NotiTipoID;
    }

    public function setNotiTipoID($NotiTipoID) {
        $this->NotiTipoID = $NotiTipoID;
    }

    public function getNotiTitulo() {
        return $this->NotiTitulo;
    }

    public function setNotiTitulo($NotiTitulo) {
        $this->NotiTitulo = $NotiTitulo;
    }

    public function getNotiSumilla() {
        return $this->NotiSumilla;
    }

    public function setNotiSumilla($NotiSumilla) {
        $this->NotiSumilla = $NotiSumilla;
    }

    public function getNotiDescripcion() {
        return $this->NotiDescripcion;
    }

    public function setNotiDescripcion($NotiDescripcion) {
        $this->NotiDescripcion = $NotiDescripcion;
    }

    public function getNotiFechaRegistro() {
        return $this->NotiFechaRegistro;
    }

    public function setNotiFechaRegistro($NotiFechaRegistro) {
        $this->NotiFechaRegistro = $NotiFechaRegistro;
    }

    public function getNotiFechaInicio() {
        return $this->NotiFechaInicio;
    }

    public function setNotiFechaInicio($NotiFechaInicio) {
        $this->NotiFechaInicio = $NotiFechaInicio;
    }

    public function getNotiFechaFinal() {
        return $this->NotiFechaFinal;
    }

    public function setNotiFechaFinal($NotiFechaFinal) {
        $this->NotiFechaFinal = $NotiFechaFinal;
    }

    public function getNotiLugar() {
        return $this->NotiLugar;
    }

    public function setNotiLugar($NotiLugar) {
        $this->NotiLugar = $NotiLugar;
    }

    public function getNotiAutor() {
        return $this->NotiAutor;
    }

    public function setNotiAutor($NotiAutor) {
        $this->NotiAutor = $NotiAutor;
    }

    public function getNotiFotoPortada() {
        return $this->NotiFotoPortada;
    }

    public function setNotiFotoPortada($NotiFotoPortada) {
        $this->NotiFotoPortada = $NotiFotoPortada;
    }

    public function getNotiNroVisitas() {
        return $this->NotiNroVisitas;
    }

    public function setNotiNroVisitas($NotiNroVisitas) {
        $this->NotiNroVisitas = $NotiNroVisitas;
    }

    public function getNotiEstado() {
        return $this->NotiEstado;
    }

    public function setNotiEstado($NotiEstado) {
        $this->NotiEstado = $NotiEstado;
    }

    
    function noticiasQry($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_NOTICIAS (?,?)", $Parametros);
        $this->db->close();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    
    function noticiasGet($Parametros) {
        $query = $this->db->query("CALL USP_GEN_S_NOTICIAS (?,?)", $Parametros);
        $this->db->close();
        if ($query) {
            $row = $query->row();
            //CREANDO EL OBJETO
            
            $this->setNotiID($row->nInfoID);
            $this->setNotiTipoID($row->nInfoTipoID);
            $this->setNotiTitulo($row->cInfoTitulo);
            $this->setNotiSumilla($row->cInfoSumilla);
            $this->setNotiDescripcion($row->cInfoDescripcion);
            $this->setNotiAutor($row->cInfoAutor);
            $this->setNotiLugar($row->cInfoLugar);
            $this->setNotiFechaRegistro($row->dInfoFechaRegistro);
            $this->setNotiFotoPortada($row->foto_noticia);
//            $this->setCanLatitud($row->cCanLatitud);
//            $this->setCanLongitud($row->cCanLongitud);
//            $this->setCanFechaRegistro($row->fecha_registro);
//            $this->setCanDireccion($row->direccion);
//            $this->setCanTelefono($row->telefono);
//            $this->setCanNroCanchas($row->nro_canchas);
//            $this->setCanFacebook($row->facebook);
//            $this->setCanEmail($row->email);
//            $this->setCanSitioWeb($row->sitio_web);
//            $this->setCanVisitas($row->nCanVisitas);
//            $this->setCanEstado($row->cCanEstado);
            return $row;
        } else {
            return null;
        }
    }
    
}

?>