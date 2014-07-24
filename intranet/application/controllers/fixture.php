<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fixture extends CI_Controller {

 
    function get_externo(){

        $url="http://elcomercio.pe/deporte-total?ref=ecr"; 

        $cadena = file_get_contents($url); 


        
        $find_1 = '<div class="nuevo-boxlosmas"'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<div class="box-clasifi"';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

