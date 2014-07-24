<?php
	class Sqlsrvmpt{ 
		private $databases = array();
		private $conexion;

		public function __construct(){  
			$this->databases = array(
	            'Integrada' => array(
	                'DB_SERVERNAME' => 'WEBMUNI',
	                'DB_DATABASENAME' => 'BDmptIntegradaCI',
	                'DB_UID' => 'desarrollo',
	                'DB_PWD' => '@desarrollo123'
	            ),
	            'tramite' => array(
	                'DB_SERVERNAME' => 'webmuni',
	                'DB_DATABASENAME' => 'tramite',
	                'DB_UID' => 'desarrollo',
	                'DB_PWD' => '@desarrollo123'
	            ),
	            'Siga' => array(
	                'DB_SERVERNAME' => 'webmuni',
	                'DB_DATABASENAME' => 'BDmptIntegradaCI',
	                'DB_UID' => 'desarrollo',
	                'DB_PWD' => '@desarrollo123'
	            ),
	            'MuniTrujillo' => array(
	                'DB_SERVERNAME' => 'webmuni',
	                'DB_DATABASENAME' => 'BDmptIntegradaCI',
	                'DB_UID' => 'desarrollo',
	                'DB_PWD' => '@desarrollo123'
	            )
	        );
		}
		public function openConnection($NameDatabase){
			$conexion = null; 
			$Server_Name = $this->databases[$NameDatabase]['DB_SERVERNAME'];
			$Database = $this->databases[$NameDatabase]['DB_DATABASENAME'];
			$UID = $this->databases[$NameDatabase]['DB_UID'];
			$PWD = $this->databases[$NameDatabase]['DB_PWD'];
			
			$connectionInfo = array(
									"Database"=>$Database,
									"UID"=>$UID,
									"PWD"=>$PWD);
			$conn = sqlsrv_connect($Server_Name, $connectionInfo);

			if($conn === false){
			     die(print_r(sqlsrv_errors(), true));
			}
			$this->conexion = $conn;

			return $this->conexion;
		}

		public function closeConnection(){
			sqlsrv_close($this->conexion);
		}
	}
	///////////////////////////////////////////////////////////////////
	//CLASE CONEXION BD PARA DRIVER SQLSRV EN CODEIGNITER
	////Autor: renzot											
	////Fecha: 28/08/2012
	///////////////////////////////////////////////////////////////////