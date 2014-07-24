<?php

class Eventos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url', 'codegen_helper'));
        $this->load->model('codegen_model', '', TRUE);
    }

    function index() {
        $this->data['main_content'] = 'eventos/evento_list';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->data['list_eventos'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', null);

        $this->load->view('master/template_view', $this->data);
    }

    function manage() {
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
        $this->data['results'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto,nUsuario', '', $config['per_page'], $this->uri->segment(3));

        $this->load->view('eventos_list', $this->data);
        //$this->template->load('content', 'eventos_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
    }

    function list_json() {

        $model = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto', '', null);
        //print_r($out);
        $dataArr['aaData'] = Array();

        for ($i = 0; $i < count($model); $i++) {

            $out[] = array(
                'id' => $model[$i]['nEveID'],
                'title' => $model[$i]['cEveTitulo'],
                'url' => $model[$i]['cEveLinkFacebook'],
                'location' => $model[$i]['cEveDireccion'],
                'startTime' => date("H:i", strtotime($model[$i]['dEveStartTime'])),
                'endTime' => date("H:i", strtotime($model[$i]['dEveEndTime'])),
                'linkFoto' => $model[$i]['cEveLinkFoto'],
                'description' => $model[$i]['cEveDescripcion'],
                'start' => strtotime($model[$i]['dEveStartTime']) . '000',
                'end' => strtotime($model[$i]['dEveEndTime']) . '000'
            );
            $dataArr['aaData'][] = $out;
        }



        header('Content-Type: application/json');
        echo json_encode($dataArr);
    }

    function add() {
        $this->data['errorfecha'] = '';
        $this->data['custom_error'] = '';

        $this->data['main_content'] = 'eventos/evento_nuevo';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->load->view('master/template_view', $this->data);

        //$this->template->load('content', 'eventos_add', $this->data);
    }

    function guardar(){

        $this->data['custom_error'] = '';
        $this->data['errorfecha'] = '';

        /*$this->form_validation->set_rules('cEveTitulo', 'Titulo', '|trim|required');
        $this->form_validation->set_rules('cEveDireccion', 'Direccion', '|trim|required');
        $this->form_validation->set_rules('cEveDescripcion', 'Description', '|trim|required');
        $this->form_validation->set_rules('dEveStartTime', 'Empiezo', '|trim|required');
        $this->form_validation->set_rules('dEveEndTime', 'Termino', '|trim|required');
        $this->form_validation->set_message('required', 'El campo %s es requerido');


        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);            
        } else {*/
            $endHora = $_POST['EndHora'];
            $startHora = $_POST['StartHora'];

            $dEveStartTime = $_POST['dEveStartTime'];
            $dEveEndTime = $_POST['dEveEndTime'];

            if (strtotime($dEveStartTime) > strtotime($dEveEndTime)) {
                $this->data['errorfecha'] = '<br><div class="text-warning">La fecha de empiezo debe ser menor a la de termino</div>';
            } else {


                $data = array(
                    'cEveLatitud' => $_POST['cEveLatitud'],
                    'cEveLongitud' => $_POST['cEveLongitud'],
                    'cEveTitulo' => $_POST['cEveTitulo'],
                    'cEveDescripcion' => $_POST['cEveDescripcion'],
                    'cEveLinkFoto' => $_POST['cEveLinkFoto'],
                    'cEveLinkFacebook' => $_POST['cEveLinkFacebook'],
                    'cEveDireccion' => $_POST['cEveDireccion'],
                    'dEveStartTime' => $_POST['dEveStartTime'] . ' ' . $startHora,
                    'dEveEndTime' => $_POST['dEveEndTime'] . ' ' . $endHora,
                    'nUbiDepartamento' => $_POST['nUbiDepartamento'],
                    'nUbiProvincia' => $_POST['nUbiProvincia'],
                    'nUbiDistrito' => $_POST['nUbiDistrito'],
                    'dEveFechaRegistro' => $_POST['dEveFechaRegistro'],
                    'cEveEstado' => $_POST['cEveEstado'],
                    'nEveCosto' => $_POST['nEveCosto'],
                    'nUsuario' => $_POST['nUsuario']
                );


                if ($this->codegen_model->add('eventos', $data) != 0) {
                    //$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
                    // or redirect
                    redirect(base_url() . 'eventos/');
                } else {
                    echo 'error 2';
                    $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';
                }
            }
        //}


    }

    function edit() {
        
        $this->data['custom_error'] = '';
        $this->data['errorfecha'] = '';


        $this->data['result'] = $this->codegen_model->get('eventos', 'nEveID,cEveLatitud,cEveLongitud,cEveTitulo,cEveDescripcion,cEveLinkFoto,cEveLinkFacebook,cEveDireccion,dEveStartTime,dEveEndTime,nUbiDepartamento,nUbiProvincia,nUbiDistrito,dEveFechaRegistro,cEveEstado,nEveCosto,nUsuario', 'nEveID = ' . $this->uri->segment(3), NULL, NULL, true);

        $this->data['main_content'] = 'eventos/evento_edit';
        $this->data['title'] = '.: Solo Canchas - Intranet :.';
        $this->data['menu_home'] = 'intranet';
        $this->data['breadcrumbs'] = 'Eventos';
        $this->load->view('master/template_view', $this->data);
        //$this->template->load('content', 'eventos_edit', $this->data);
    }

    function editar(){

        $this->data['custom_error'] = '';
        $this->data['errorfecha'] = '';

        $endHora = $_POST['EndHora'];
        $startHora = $_POST['StartHora'];

        $dEveStartTime = $_POST['dEveStartTime'];
        $dEveEndTime = $_POST['dEveEndTime'];

        if (strtotime($dEveStartTime) > strtotime($dEveEndTime)) {
            $this->data['errorfecha'] = '<br><div class="text-warning">La fecha de empiezo debe ser menor a la de termino</div>';
        } else {

            $data = array(
                'cEveLatitud' => $_POST['cEveLatitud'],
                'cEveLongitud' => $_POST['cEveLongitud'],
                'cEveTitulo' => $_POST['cEveTitulo'],
                'cEveDescripcion' => $_POST['cEveDescripcion'],
                'cEveLinkFoto' => $_POST['cEveLinkFoto'],
                'cEveLinkFacebook' => $_POST['cEveLinkFacebook'],
                'cEveDireccion' => $_POST['cEveDireccion'],
                'dEveStartTime' => $_POST['dEveStartTime'] . ' ' . $startHora,
                'dEveEndTime' => $_POST['dEveEndTime'] . ' ' . $endHora,
                'nUbiDepartamento' => $_POST['nUbiDepartamento'],
                'nUbiProvincia' => $_POST['nUbiProvincia'],
                'nUbiDistrito' => $_POST['nUbiDistrito'],
                'dEveFechaRegistro' => $_POST['dEveFechaRegistro'],
                'cEveEstado' => $_POST['cEveEstado'],
                'nEveCosto' => $_POST['nEveCosto'],
                'nUsuario' => $_POST['nUsuario']
            );


            if ($this->codegen_model->edit('eventos', $data, 'nEveID', $_POST['nEveID']) == TRUE) {
                redirect(base_url() . 'eventos/');
            } else {
                echo 'error 2';
                $this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';
            }
        }
        


    }

    function delete() {
        $ID = $this->uri->segment(3);
        $this->codegen_model->delete('eventos', 'nEveID', $ID);
        redirect(base_url() . 'index.php/eventos/');
    }

}

/* End of file eventos.php */
/* Location: ./system/application/controllers/eventos.php */