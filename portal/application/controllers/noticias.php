<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/noticias_model');
    }

    public function index() {
        $data['main_content'] = 'noticias/noticias_view';
        $data['title'] = '.: Solo Canchas - Noticias :.';
        $data['menu_home'] = 'noticias';
        $this->load->view('master/template_view', $data);
    }
    
    public function detalle($nombre_y_codigo){
        $cadena = explode("_", $nombre_y_codigo);
        $cod_noticia = $cadena[1];
        $data = $this->noticiasGet($cod_noticia);
        
        $data['main_content'] = 'noticias/noticia_seleccionada_view';
        $data['title'] = '.: Solo Canchas - Información de la Noticia seleccionada :.';
        $data['menu_home'] = 'noticias';
        $data['list_otrasnoticias'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-OTRAS',$cadena[1]));
        $this->load->view('master/template_view', $data);
    }
    
    public function noticiasGet($cod_noticia){
        $query = $this->noticias_model->noticiasGet(array('LISTADO-NOTICIAS-CODIGO', $cod_noticia));

        if ($query) {
            $data['nNotiID'] = $this->noticias_model->getNotiID();
            $data['nNotiTipo'] = $this->noticias_model->getNotiTipoID();
            $data['cNotiTitulo'] = $this->noticias_model->getNotiTitulo();
            $data['cNotiSumilla'] = $this->noticias_model->getNotiSumilla();
            $data['cNotiDescripcion'] = $this->noticias_model->getNotiDescripcion();
            $data['cNotiAutor'] = $this->noticias_model->getNotiAutor();
            $data['cNotiLugar'] = $this->noticias_model->getNotiLugar();
            $data['cNotiFechaRegistro'] = $this->noticias_model->getNotiFechaRegistro();
            $data['cNotiFotoPortada'] = $this->noticias_model->getNotiFotoPortada();
//            $data['cCanLongitud'] = $this->noticias_model->getCanLongitud();
//            $data['fecha_registro'] = $this->noticias_model->getCanFechaRegistro();
//            $data['cCanDireccion'] = $this->noticias_model->getCanDireccion();
//            $data['cCamTelefono'] = $this->noticias_model->getCanTelefono();
//            $data['nCanNroCanchas'] = $this->noticias_model->getCanNroCanchas();
//            $data['cCanFacebook'] = $this->noticias_model->getCanFacebook();
//            $data['cCanEmail'] = $this->noticias_model->getCanEmail();
//            $data['cCanSitioWeb'] = $this->noticias_model->getCanSitioWeb();
//            $data['nCanVisitas'] = $this->noticias_model->getCanVisitas();
//            $data['cCanEstado'] = $this->noticias_model->getCanEstado();
            return $data;
        } else {
            return false;
        }
    }

}