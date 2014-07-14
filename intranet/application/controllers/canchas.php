<?php

class Canchas extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/canchas/manage/';
        $config['total_rows'] = $this->codegen_model->count('canchas');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->codegen_model->get('canchas','nCanID,cCanNombre,cCanDescripcion,cCanLatitud,cCanLongitud,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dCanFechaRegistro,nCanVisitas,cCanEstado','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('canchas_list', $this->data); 
       //$this->template->load('content', 'canchas_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('canchas') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cCanNombre' => set_value('cCanNombre'),
					'cCanDescripcion' => set_value('cCanDescripcion'),
					'cCanLatitud' => set_value('cCanLatitud'),
					'cCanLongitud' => set_value('cCanLongitud'),
					'nUbiDepartamento' => set_value('nUbiDepartamento'),
					'nUbiProvincia' => set_value('nUbiProvincia'),
					'nUbiDistrito' => set_value('nUbiDistrito'),
					'dCanFechaRegistro' => set_value('dCanFechaRegistro'),
					'nCanVisitas' => set_value('nCanVisitas'),
					'cCanEstado' => set_value('cCanEstado')
            );
           
			if ($this->codegen_model->add('canchas',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/canchas/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('canchas_add', $this->data);   
        //$this->template->load('content', 'canchas_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('canchas') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'cCanNombre' => $this->input->post('cCanNombre'),
					'cCanDescripcion' => $this->input->post('cCanDescripcion'),
					'cCanLatitud' => $this->input->post('cCanLatitud'),
					'cCanLongitud' => $this->input->post('cCanLongitud'),
					'nUbiDepartamento' => $this->input->post('nUbiDepartamento'),
					'nUbiProvincia' => $this->input->post('nUbiProvincia'),
					'nUbiDistrito' => $this->input->post('nUbiDistrito'),
					'dCanFechaRegistro' => $this->input->post('dCanFechaRegistro'),
					'nCanVisitas' => $this->input->post('nCanVisitas'),
					'cCanEstado' => $this->input->post('cCanEstado')
            );
           
			if ($this->codegen_model->edit('canchas',$data,'nCanID',$this->input->post('nCanID')) == TRUE)
			{
				redirect(base_url().'index.php/canchas/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->codegen_model->get('canchas','nCanID,cCanNombre,cCanDescripcion,cCanLatitud,cCanLongitud,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dCanFechaRegistro,nCanVisitas,cCanEstado','nCanID = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('canchas_edit', $this->data);		
        //$this->template->load('content', 'canchas_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('canchas','nCanID',$ID);             
            redirect(base_url().'index.php/canchas/manage/');
    }
}

/* End of file canchas.php */
/* Location: ./system/application/controllers/canchas.php */