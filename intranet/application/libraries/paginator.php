<?php

class paginator {

    //atributos   
    private $Parametros = array();
    private $pOUT = 'sssss';
    private $stmt;
    private $cn;
    private $connectionInfo;
    private $serverName;

    public function __construct() {
        $this->serverName = "172.20.1.50"; //serverName\instanceName
        //$serverName = "172.20.1.50"; //serverName\instanceName
        $this->connectionInfo = array("Database" => "bdMptIntegradaCI", "UID" => "desarrollo", "PWD" => "@desarrollo123");
        //$connectionInfo = array("Database"=>"bdMptIntegrada", "UID"=>"desarrollo", "PWD"=>"@desarrollo123");                        
        $this->cn = sqlsrv_connect($this->serverName, $this->connectionInfo);
    }

    public function Paginador($Config) {
        $CI = & get_instance();
        $RegistrosAMostrar = $Config['data_view'];
        $PaginasIntervalo = $Config['data_interval'];
//        if (isset($CI->input->post('PagAct'))) {
//            $RegistrosAEmpezar = ($CI->input->post('PagAct') - 1) * $RegistrosAMostrar;
//            $PagAct = $CI->input->post('PagAct');
//        } else {
//            $RegistrosAEmpezar = 1;
//            $PagAct = 1;
//        }


        $CI->load->model($Config['modelo']);
        $aDataList = $CI->$Config['modelo']->$Config['metodo']($Config['criterios']);


//        print_r($aDataList);



        foreach ($aDataList as $aDataList) {
            $var = str_replace($Config['Ide_Atributo']['Title'], $aDataList['cNotTitulo'], $Config['Style']);
            $var = str_replace($Config['Ide_Atributo']['Content'], $aDataList['cNotContenido'], $Config['Style']);
            echo str_replace($Config['Ide_Atributo']['Sumilla'], $aDataList['cNotContenido'], $var);
//            echo $aDataList['nPerId'] . $Config['Style'] . $Config['Ide_Atributo']['Title'];
        }
//        echo $Config['Style'];
//        echo $Config['Ide_Atributo'];
        exit;

//          $nPerId =$_SESSION['nPerCodigo'];
//        $nTNotTipo = "22";
//        $procedure = mssql_init("[PORTALEMP_GEN_S_NOTICIAS]", $cn->AbrirBDmptIntegrada()); //definimos nuestro SP
//        mssql_bind($procedure, "@nTNotTipo", $nTNotTipo, SQLVARCHAR, false, false, 2);
//        mssql_bind($procedure, "@RegistrosAEmpezar", $RegistrosAEmpezar, SQLVARCHAR, false, false, 2);
//        mssql_bind($procedure, "@RegistrosAMostrar", $RegistrosAMostrar, SQLVARCHAR, false, false, 2);
//        $registros = mssql_execute($procedure);


        if (mssql_num_rows($registros)) {
//          echo"<table>";





            while ($reg = mssql_fetch_array($registros)) {

                echo"<div id='contenido'style='overflow:auto;min-height:80px;border-bottom:1px solid #D8D8D8'>
   <div style='float:left;width:85%' id='noticia'>
   <a href='detalleNoticia.php?nNotCodigo=" . mb_convert_encoding($reg['nNotCodigo'], 'UTF-8') . "'><p class='titulonoticia' style='font-weight:bold;'>" . mb_convert_encoding($reg['cNotTitulo'], 'UTF-8') . "</p></a>
       <p>" . mb_convert_encoding($reg['cNotContenido'], 'UTF-8') . "</p>

   </div>     
   <div id='fechanoticia' style='float:right;'>
 <a href='#'> </a><h3 style='color:#084B8A'>" . mb_convert_encoding($reg['nombredia'], 'UTF-8') . " " . mb_convert_encoding($reg['nomdia'], 'UTF-8') . "</h3><a href='detalleNoticia.php?nNotCodigo=" . mb_convert_encoding($reg['nNotCodigo'], 'UTF-8') . "'title='ver detalle'><img style='margin-left:20px;'align='left'src='images/mini_icon_view.png' ></a><p style='color:#084B8A'>" . mb_convert_encoding($reg['mes'], 'UTF-8') . "</p>
       
</div>
</div><br/>";

                $NroRegistros = $reg['row_count'];
            }

            $PagAnt = $PagAct - 1;
            $PagSig = $PagAct + 1;
            $PagUlt = $NroRegistros / $RegistrosAMostrar;
            //verificamos residuo para ver si llevar� decimales
            $Res = $NroRegistros % $RegistrosAMostrar;
            // si hay residuo usamos funcion floor para que me
            // devuelva la parte entera, SIN REDONDEAR, y le sumamos
            // una unidad para obtener la ultima pagina
            if ($Res > 0)
                $PagUlt = floor($PagUlt) + 1;



            if ($PagAct > ($PaginasIntervalo + 1)) {
                echo "<a style='cursor:pointer;' onclick=\"listar_noticia_empresas('1')\" class='paginador'><< Primero</a>";
                echo "&nbsp;";
            }
            for ($i = ($PagAct - $PaginasIntervalo); $i <= ($PagAct - 1); $i++) {
                if ($i >= 1) {
                    echo "<a  style='cursor:pointer;' onclick=\"listar_noticia_empresas('$i')\" class='paginador'>" . $i . "</a>";
                    echo "&nbsp;";
                }
            }
            echo "<span style='cursor:pointer;' class='paginadoractivo'>" . $PagAct . "</span>";
            echo "&nbsp;";
            for ($i = ($PagAct + 1); $i <= ($PagAct + $PaginasIntervalo); $i++) {
                if ($i <= $PagUlt) {
                    echo "<a style='cursor:pointer;' onclick=\"listar_noticia_empresas('$i')\" class='paginador'>" . $i . "</a>";
                    echo "&nbsp;";
                }
            }

            if ($PagAct < ($PagUlt - $PaginasIntervalo)) {
                echo "<a style='cursor:pointer;' onclick=\"listar_noticia_empresas('$PagUlt')\" class='paginador'>Último >></a>";
            }
        } else {
            echo"<div style='color:red;font-size='20px'> NO EXISTEN REGISTRADOS AUN PARA ESTE TALLER</div>";
        }


        mssql_free_statement($procedure);
    }

}

?>