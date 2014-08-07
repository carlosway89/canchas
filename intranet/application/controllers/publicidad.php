<?php

class Publicidad extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');        
        $this->load->helper(array('form','url','codegen_helper'));
        $this->load->model('codegen_model','',TRUE);
        $this->loaders->verificaAcceso('W');

        $this->load->model('admin/permisos_model');

        $acceso=$this->permisos_model->permisos(array('ACCESO-PERMISO-USER',$this->session->userdata('nUsuID'),'Publicidad'));
        if(!$acceso)
            redirect(base_url().'manage');

        
    }   
    

    function index(){

        $this->data['main_content'] = 'publicidad/publicidad_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Publicidad';
        $this->data['list_multimedia'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultFechaRegistro,cMultFechaInicial,cMultFechaFinal,nParID,cMultEstado,cMultNumVisitas', 'nMultCategID = 5', null);

        $this->load->view('master/template_view', $this->data);

    }

    
    function add_foto(){        
        
        $this->data['custom_error'] = '';   

        $this->data['main_content'] = 'publicidad/nueva_publicidad';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Publicidad';
        $this->load->view('master/template_view', $this->data); 
    }

    function guardar_foto(){
        
        $this->data['custom_error'] = '';


        $data = array(
            'nMultTipoID' => '1',
            'nMultCategID' => '5',
            'cMultLinkMiniatura' => $_POST['foto_url'],
            'cMultLink' => $_POST['foto_url'],
            'cMultTitulo' => $this->input->post('cMultTitulo'),
            'cMultDescripcion' => $this->input->post('cMultDescripcion'),
            'cMultFechaRegistro' => date('Y-m-d'),
            'cMultFechaInicial' => date('Y-m-d'),
            'cMultFechaFinal' => date('Y-m-d'),
            'cMultEstado' => 'H',
            'cMultNumVisitas' => 0
            );

        if ($this->codegen_model->add('multimedia',$data) != 0)
        {
                    //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                    // or redirect
         redirect(base_url().'publicidad');
       }
       else
       {
           $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

       }



    }

    function delete_foto(){
        $ID =  $this->uri->segment(3);
        $action=$this->codegen_model->delete('multimedia','nMultID',$ID); 
        if ($action==TRUE) {
            
            redirect(base_url().'publicidad/');  
        } 
        else{
            echo 'error';
        }
                         
        
    }

}

/* End of file multimedia.php */
/* Location: ./system/application/controllers/multimedia.php */