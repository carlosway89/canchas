<?php

class Multimedia extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
		$this->load->model('admin/noticias_model');
        $this->loaders->verificaAcceso('W');
	}	
	
	function index(){
		$this->noticias();
	}

	function fotos(){

		$this->data['main_content'] = 'multimedia/foto_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Multimedia';
        $this->data['list_multimedia'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultFechaRegistro,cMultFechaInicial,cMultFechaFinal,nParID,cMultEstado,cMultNumVisitas', '', null);

        $this->load->view('master/template_view', $this->data);

	}
	function noticias(){

		$this->data['main_content'] = 'multimedia/noticia_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Noticias';
        $this->data['list_noticias'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-CRITERIO',''));
        $this->load->view('master/template_view', $this->data);

	}
	function videos(){

		$this->data['main_content'] = 'multimedia/video_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Multimedia';
        $this->data['list_multimedia'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultFechaRegistro,cMultFechaInicial,cMultFechaFinal,nParID,cMultEstado,cMultNumVisitas', '', null);

        $this->load->view('master/template_view', $this->data);

	}
	
    function add_foto(){        
        
		$this->data['custom_error'] = '';	

		$this->data['main_content'] = 'multimedia/nueva_foto';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Noticias';
        $this->load->view('master/template_view', $this->data);	
    }

    function guardar_foto(){
    	
        $this->data['custom_error'] = '';


        $data = array(
            'nMultTipoID' => $this->input->post('nMultTipoID'),
            'nMultCategID' => $this->input->post('nMultCategID'),
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
         redirect(base_url().'multimedia/fotos');
       }
       else
       {
           $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

       }



    }

    function add_noticia(){   

		   
		$this->data['custom_error'] = '';
		
        
        $this->data['main_content'] = 'multimedia/nueva_noticia';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Noticias';
        $this->load->view('master/template_view', $this->data);	

    }

    function guardar_noticia(){
  	
    	                            
    	$data_informacion = array(
    		'nInfoTipoID' => $_POST['nInfoTipoID'],
    		'cInfoTitulo' => $_POST['cInfoTitulo'],
    		'cInfoSumilla' => $_POST['cInfoSumilla'],
    		'cInfoDescripcion' => $_POST['cInfoDescripcion'],
    		'dInfoFechaRegistro' => date('Y-m-d'),
    		'dInfoFechaInicio' => date('Y-m-d'),
    		'dInfoFechaFinal' => date('Y-m-d'),
    		'cInfoLugar' => $_POST['cInfoLugar'],
    		'cInfoAutor' => $_POST['cInfoAutor'],
    		'nParID' => $_POST['nParID'],
    		'nPcaID' => $_POST['nPcaID'],
    		'nInfoVisitas' => $_POST['nInfoVisitas'],
    		'cInfoEstado' => $_POST['cInfoEstado'],
    		'nUsuID' => $_POST['nUsuID'],
    		'cInfoLinkFoto' => $_POST['foto_url'],
    		);

    	$data_multimedia = array(
    		'nMultTipoID' => 6,
    		'nMultCategID' =>1,
    		'cMultLinkMiniatura' => $_POST['foto_url'],
    		'cMultLink' => $_POST['foto_url'],
    		'cMultTitulo' => $_POST['cInfoTitulo'],
    		'cMultDescripcion' => $_POST['cInfoDescripcion'],
    		'cMultFechaRegistro' => date('Y-m-d'),
    		'cMultFechaInicial' => date('Y-m-d'),
    		'cMultFechaFinal' => date('Y-m-d'),
    		'cMultEstado' => 'H',
    		'cMultNumVisitas' => 0
    		);
	           
    	

    	$id_info=$this->codegen_model->add('informacion',$data_informacion);

    	if ($id_info != 0)
    	{
    		$id_multimedia=$this->codegen_model->add('multimedia',$data_multimedia);

			if ( $id_multimedia != 0)
	    	{
	    		$data_mul_info = array(
	    			'nMultID' => $id_multimedia,
	    			'nInfoID' =>$id_info ,
	    			'cMultInfoEstado' => 'H'
	    		);

	    		if($this->codegen_model->add('multimedia_informacion',$data_mul_info) != 0){

	    			redirect(base_url().'multimedia/noticias/');

	    		}
				
	    	}    		
    	}
    	else
    	{
    		$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

    	}
		

    }
    function add_video(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('multimedia') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {       


			$config['upload_path'] = './uploads/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $config['max_size'] = '2000';
	        $config['max_width'] = '2024';
	        $config['max_height'] = '2008';

	        $this->load->library('upload', $config);

	        if (!$this->multimedia->add_foto()) {
	            $error = array('error' => $this->upload->display_errors());
	            $this->load->view('upload_view', $error);
	        }
	        else{
	        	$data = array(
                    'nMultTipoID' => set_value('nMultTipoID'),
					'nMultCategID' => set_value('nMultCategID'),
					'cMultLinkMiniatura' => set_value('cMultLinkMiniatura'),
					'cMultLink' => set_value('cMultLink'),
					'cMultTitulo' => set_value('cMultTitulo'),
					'cMultDescripcion' => set_value('cMultDescripcion'),
					'cMultFechaRegistro' => set_value('cMultFechaRegistro'),
					'cMultFechaInicial' => set_value('cMultFechaInicial'),
					'cMultFechaFinal' => set_value('cMultFechaFinal'),
					'nParID' => set_value('nParID'),
					'cMultEstado' => set_value('cMultEstado'),
					'cMultNumVisitas' => set_value('cMultNumVisitas')
	            );
	           
				if ($this->codegen_model->add('multimedia',$data) == TRUE)
				{
					//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
					// or redirect
					redirect(base_url().'index.php/multimedia/');
				}
				else
				{
					$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

				}


	        } 

        }	

		$this->data['main_content'] = 'multimedia/nuevo_video';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Noticias';
        $this->load->view('master/template_view', $this->data);	
    }	
    
    function edit_noticia(){        
        
        $id_noticia=$this->uri->segment(3);
		$this->data['list_noticias'] = $this->noticias_model->noticiasQry(array('LISTADO-NOTICIAS-CODIGO',$id_noticia));
		$this->data['main_content'] = 'multimedia/editar_noticia';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Noticias';
        $this->load->view('master/template_view', $this->data);		
        //$this->template->load('content', 'multimedia_edit', $this->data);
    }

    function editar_noticia(){

        $data_informacion = array(
            'nInfoTipoID' => $_POST['nInfoTipoID'],
            'cInfoTitulo' => $_POST['cInfoTitulo'],
            'cInfoSumilla' => $_POST['cInfoSumilla'],
            'cInfoDescripcion' => $_POST['cInfoDescripcion'],
            'dInfoFechaRegistro' => date('Y-m-d'),
            'dInfoFechaInicio' => date('Y-m-d'),
            'dInfoFechaFinal' => date('Y-m-d'),
            'cInfoLugar' => $_POST['cInfoLugar'],
            'cInfoAutor' => $_POST['cInfoAutor'],
            'nParID' => $_POST['nParID'],
            'nPcaID' => $_POST['nPcaID'],
            'nInfoVisitas' => $_POST['nInfoVisitas'],
            'cInfoEstado' => $_POST['cInfoEstado'],
            'nUsuID' => $_POST['nUsuID'],
            'cInfoLinkFoto' => $_POST['foto_url'],
            );

        $data_multimedia = array(
            'nMultTipoID' => 6,
            'nMultCategID' =>1,
            'cMultLinkMiniatura' => $_POST['foto_url'],
            'cMultLink' => $_POST['foto_url'],
            'cMultTitulo' => $_POST['cInfoTitulo'],
            'cMultDescripcion' => $_POST['cInfoDescripcion'],
            'cMultFechaRegistro' => date('Y-m-d'),
            'cMultFechaInicial' => date('Y-m-d'),
            'cMultFechaFinal' => date('Y-m-d'),
            'cMultEstado' => 'H',
            'cMultNumVisitas' => 0
            );
               
        
        if ($this->codegen_model->edit('informacion',$data_informacion,'nInfoID',$this->input->post('nInfoID')) == TRUE)
        {

            if ( $this->codegen_model->edit('multimedia',$data_multimedia,'nMultID',$this->input->post('nMultID')) == TRUE)
            {
                redirect(base_url().'multimedia/noticias/');                
            }           
        }
        else
        {
            echo 'error';

        }


    }

    function delete_foto(){
    	$ID =  $this->uri->segment(3);
		$action=$this->codegen_model->delete('multimedia','nMultID',$ID); 
        if ($action==TRUE) {
        	
        	redirect(base_url().'multimedia/fotos/');  
        } 
    	else{
    		echo 'error';
    	}
                         
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('multimedia','nMultID',$ID);             
            redirect(base_url().'multimedia/noticias');
    }
}

/* End of file multimedia.php */
/* Location: ./system/application/controllers/multimedia.php */