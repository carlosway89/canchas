<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Multimedia extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'codegen_helper'));
        $this->load->model('codegen_model', '', TRUE);
    }
    public function index() {
        $data['main_content'] = 'multimedia/contacto_view';
        $data['title'] = '.: Solo Canchas - Multimedia :.';
        $data['menu_home'] = 'multimedia';
        $this->load->view('master/template_view', $data);
    }

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/multimedia/manage/';
        $config['total_rows'] = $this->codegen_model->count('multimedia');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->codegen_model->get('multimedia','nMultID,nMultTipoID,nMultCategID,cMultLinkMiniatura,cMultLink,cMultTitulo,cMultDescripcion,cMultFechaRegistro,cMultFechaInicial,cMultFechaFinal,nParID,cMultEstado,cMultNumVisitas','',$config['per_page'],$this->uri->segment(3));
       
	    $this->data['main_content'] = 'multimedia/list';
        $this->data['title'] = '.: Solo Canchas - Multimedia :.';
        $this->data['menu_home'] = 'Multimedia';
        $this->load->view('master/template_view', $this->data);
       //$this->template->load('content', 'multimedia_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('multimedia') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
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
				redirect(base_url().'index.php/multimedia/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('multimedia_add', $this->data);   
        //$this->template->load('content', 'multimedia_add', $this->data);
    }	
    
    function edit(){        
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
		
		$this->data['main_content'] = 'multimedia/multimedia_edit';
        $this->data['title'] = '.: Solo Canchas - Multimedia :.';
        $this->data['menu_home'] = 'multimedia';
        $this->load->view('master/template_view', $this->data);	
        //$this->template->load('content', 'multimedia_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('multimedia','nMultID',$ID);             
            redirect(base_url().'index.php/multimedia/manage/');
    }

}