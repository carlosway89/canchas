<?php

class Multimedia extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
		$this->load->model('admin/noticias_model');
	}	
	
	function index(){
		$this->noticia();
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

		$this->load->view('multimedia_add', $this->data);   
        //$this->template->load('content', 'multimedia_add', $this->data);
    }
    function add_noticia(){        
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

		$this->load->view('multimedia_add', $this->data);   
        //$this->template->load('content', 'multimedia_add', $this->data);
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

		$this->load->view('multimedia_add', $this->data);   
        //$this->template->load('content', 'multimedia_add', $this->data);
    }	
    
    function edit_noticia(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('multimedia') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nMultTipoID' => $this->input->post('nMultTipoID'),
					'nMultCategID' => $this->input->post('nMultCategID'),
					'cMultLinkMiniatura' => $this->input->post('cMultLinkMiniatura'),
					'cMultLink' => $this->input->post('cMultLink'),
					'cMultTitulo' => $this->input->post('cMultTitulo'),
					'cMultDescripcion' => $this->input->post('cMultDescripcion'),
					'cMultFechaRegistro' => $this->input->post('cMultFechaRegistro'),
					'cMultFechaInicial' => $this->input->post('cMultFechaInicial'),
					'cMultFechaFinal' => $this->input->post('cMultFechaFinal'),
					'nParID' => $this->input->post('nParID'),
					'cMultEstado' => $this->input->post('cMultEstado'),
					'cMultNumVisitas' => $this->input->post('cMultNumVisitas')
            );
           
			if ($this->codegen_model->edit('multimedia',$data,'nMultID',$this->input->post('nMultID')) == TRUE)
			{
				redirect(base_url().'index.php/multimedia/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultFechaRegistro,cMultFechaInicial,cMultFechaFinal,nParID,cMultEstado,cMultNumVisitas','nMultID = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('multimedia_edit', $this->data);		
        //$this->template->load('content', 'multimedia_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('multimedia','nMultID',$ID);             
            redirect(base_url().'index.php/multimedia/manage/');
    }
}

/* End of file multimedia.php */
/* Location: ./system/application/controllers/multimedia.php */