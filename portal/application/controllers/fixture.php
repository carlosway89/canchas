<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fixture extends CI_Controller {

 
    function get_posiciones(){

        $url="http://depor.pe/estadisticas/peru/posiciones"; 

        $cadena = file_get_contents($url); 


        
        $find_1 = '<footer'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<section';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }
    function get_resultado($id_fecha){

        $url="http://depor.pe/estadisticas/peru/resultados/".$id_fecha;  

        $cadena = file_get_contents($url); 


        
        $find_1 = '<footer'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<section';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }
    function get_calendario($id_fecha){

        $url="http://depor.pe/estadisticas/peru/calendario/".$id_fecha; 

        $cadena = file_get_contents($url); 


        
        $find_1 = '<footer'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<section';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }
    function get_goleadores(){

        $url="http://depor.pe/estadisticas/peru/goleadores"; 

        $cadena = file_get_contents($url); 


        
        $find_1 = '<footer'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<section';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }

    function get_envivo(){

        $url="http://www.libero.pe/"; 

        $cadena = file_get_contents($url); 


        
        $find_1 = '</div><div class="controls">'; 
        $position_1 = strpos($cadena, $find_1);
        
        $cadena = substr($cadena, 0, $position_1);

        
        $find_2 = '<div class="slider" id="slider-partido-agenda">';
        
        $position_2 = strpos($cadena, $find_2);

        $cadena = substr($cadena, $position_2);

        
        

        echo  $cadena;

    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

