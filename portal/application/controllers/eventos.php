<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eventos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'codegen_helper'));
        $this->load->model('codegen_model', '', TRUE);
    }

    public function index() {
        $data['main_content'] = 'eventos/eventos_view';
        $data['title'] = '.: Solo Canchas - Eventos :.';
        $data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $data);
    }

    public function registrar() {
        $data['main_content'] = 'eventos/eventos_view';
        $data['title'] = '.: Solo Canchas - Eventos :.';
        $data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $data);
    }

    public function buscar($nombre){

        $data['result']=$this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto','',null,null,false,'array','cEveTitulo',$nombre);
        $data['main_content'] = 'eventos/evento_buscar';
        $data['title'] = '.: Solo Canchas - Eventos :.';
        $data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $data);
    }

    public function events_json(){
        $model=$this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', null);
        //print_r($out);
        for($i=0;$i<count($model);$i++){

            $out[] = array(
                'id'=>$model[$i]['nEveID'],
                'title'=>$model[$i]['cEveTitulo'],
                'url'=>$model[$i]['cEveLinkFacebook'],
                'location'=>$model[$i]['cEveDireccion'],
                'startTime'=>date("H:i",strtotime($model[$i]['dEveStartTime'])),
                'endTime'=>date("H:i",strtotime($model[$i]['dEveEndTime'])),
                'linkFoto'=>$model[$i]['cEveLinkFoto'],
                'description'=>$model[$i]['cEveDescripcion'],
                'start'=>strtotime($model[$i]['dEveStartTime']).'000',
                'end'=>strtotime($model[$i]['dEveEndTime']).'000'

            );
            

        }
        echo json_encode(array('success' => 1, 'result' => $out));
    }
    public function mostrar() {

        
        $this->data['result'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', 'nEveID = '. $this->uri->segment(3), 1, null);
        if(!$this->data['result'])
            redirect('/eventos');
        $this->data['main_content'] = 'eventos/evento_detalle';
        $this->data['title'] = '.: Solo Canchas - Eventos :.';
        $this->data['menu_home'] = 'Eventos';

        $this->load->view('master/template_view', $this->data);
    }

    public function manage() {
        $this->load->library('table');
        $this->load->library('pagination');

        //paging
        $config['base_url'] = base_url() . 'index.php/eventos/manage/';
        $config['total_rows'] = $this->codegen_model->count('eventos');
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        // make sure to put the primarykey first when selecting , 
        //eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
        // Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
        $this->data['results'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', $config['per_page'], $this->uri->segment(3));

        $this->data['main_content'] = 'eventos/list';
        $this->data['title'] = '.: Solo Canchas - Eventos :.';
        $this->data['menu_home'] = 'Eventos';
        $this->load->view('master/template_view', $this->data);
        //$this->template->load('content', 'eventos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */