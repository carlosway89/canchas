<?php

class Eventos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
	}	
	
	function index(){
		$this->data['main_content'] = 'eventos/evento_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->data['list_eventos'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', null);

        $this->load->view('master/template_view', $this->data);
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = base_url().'index.php/eventos/manage/';
        $config['total_rows'] = $this->codegen_model->count('eventos');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->codegen_model->get('eventos','nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto,nUsuario','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('eventos_list', $this->data); 
       //$this->template->load('content', 'eventos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
    function list_json(){

        $model=$this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', null);
        //print_r($out);
        $dataArr['aaData'] = Array();

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
            $dataArr['aaData'][] = $out;
            

        }

        
            
        header('Content-Type: application/json');
        echo json_encode($dataArr);
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
        $this->data['errorfecha'] = '';

        
		
        if ($this->form_validation->run('eventos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        }

        else{
            $endHora=$_POST['EndHora'];
            $startHora=$_POST['StartHora'];

            $dEveStartTime=$_POST['dEveStartTime'];
            $dEveEndTime=$_POST['dEveEndTime'];  

            if (strtotime($dEveStartTime) > strtotime($dEveEndTime)) {
                $this->data['errorfecha'] = '<br><div class="text-warning">La fecha de empiezo debe ser menor a la de termino</div>';
            } 
             else
            {
                  

                $data = array(
                        'cEveLatitud' => set_value('cEveLatitud'),
    					'cEveLongitud' => set_value('cEveLongitud'),
    					'cEveTitulo' => set_value('cEveTitulo'),
    					'cEveDescripcion' => set_value('cEveDescripcion'),
    					'cEveLinkFoto' => set_value('cEveLinkFoto'),
    					'cEveLinkFacebook' => set_value('cEveLinkFacebook'),
    					'cEveDireccion' => set_value('cEveDireccion'),
    					'dEveStartTime' => set_value('dEveStartTime').' '.$startHora,
    					'dEveEndTime' => set_value('dEveEndTime').' '.$endHora,
    					'nUbiDepartamento' => set_value('nUbiDepartamento'),
    					'nUbiProvincia' => set_value('nUbiProvincia'),
    					'nUbiDistrito' => set_value('nUbiDistrito'),
    					'dEveFechaRegistro' => set_value('dEveFechaRegistro'),
    					'cEveEstado' => set_value('cEveEstado'),
    					'nEveCosto' => set_value('nEveCosto'),
    					'nUsuario' => set_value('nUsuario')
                );
                
               
    			if ($this->codegen_model->add('eventos',$data) == TRUE)
    			{
    				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
    				// or redirect
    				redirect(base_url().'index.php/eventos/');
    			}
    			else
    			{
    				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

    			}
    		}	
        }	   
		$this->data['main_content'] = 'eventos/evento_nuevo';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->load->view('master/template_view', $this->data);   
        //$this->template->load('content', 'eventos_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
        $this->data['errorfecha'] = '';
		
        if ($this->form_validation->run('eventos') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        }
        else{
            $endHora=$_POST['EndHora'];
            $startHora=$_POST['StartHora'];

            $dEveStartTime=$_POST['dEveStartTime'];
            $dEveEndTime=$_POST['dEveEndTime'];  

            if (strtotime($dEveStartTime) > strtotime($dEveEndTime)) {
                $this->data['errorfecha'] = '<br><div class="text-warning">La fecha de empiezo debe ser menor a la de termino</div>';
            }            
            else{
     
                $data = array(
                        'cEveLatitud' => $this->input->post('cEveLatitud'),
                        'cEveLongitud' => $this->input->post('cEveLongitud'),
                        'cEveTitulo' => $this->input->post('cEveTitulo'),
                        'cEveDescripcion' => $this->input->post('cEveDescripcion'),
                        'cEveLinkFoto' => $this->input->post('cEveLinkFoto'),
                        'cEveLinkFacebook' => $this->input->post('cEveLinkFacebook'),
                        'cEveDireccion' => $this->input->post('cEveDireccion'),
                        'dEveStartTime' => set_value('dEveStartTime').' '.$startHora,
                        'dEveEndTime' => set_value('dEveEndTime').' '.$endHora,
                        'nUbiDepartamento' => $this->input->post('nUbiDepartamento'),
                        'nUbiProvincia' => $this->input->post('nUbiProvincia'),
                        'nUbiDistrito' => $this->input->post('nUbiDistrito'),
                        'dEveFechaRegistro' => $this->input->post('dEveFechaRegistro'),
                        'cEveEstado' => $this->input->post('cEveEstado'),
                        'nEveCosto' => $this->input->post('nEveCosto'),
                        'nUsuario' => $this->input->post('nUsuario')
                );
                

                if ($this->codegen_model->edit('eventos',$data,'nEveID',$this->input->post('nEveID')) == TRUE)
                {
                    redirect(base_url().'index.php/eventos/');
                }
                else
                {
                    $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

                }
            }

        }

		$this->data['result'] = $this->codegen_model->get('eventos','nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto,nUsuario','nEveID = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->data['main_content'] = 'eventos/evento_edit';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->load->view('master/template_view', $this->data); 	
        //$this->template->load('content', 'eventos_edit', $this->data);
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('eventos','nEveID',$ID);             
            redirect(base_url().'index.php/eventos/');
    }
}

/* End of file eventos.php */
/* Location: ./system/application/controllers/eventos.php */