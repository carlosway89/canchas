<?php

$config = array(
             	


             	


             	'persona' => array(array(
                                	'field'=>'cPerNombres',
                                	'label'=>'CPerNombres',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cPerApePaterno',
                                	'label'=>'CPerApePaterno',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cPerApeMaterno',
                                	'label'=>'CPerApeMaterno',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cPerTipo',
                                	'label'=>'CPerTipo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'dPerFechaRegistro',
                                	'label'=>'DPerFechaRegistro',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cPerEstado',
                                	'label'=>'CPerEstado',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'multimedia' => array(array(
                                	'field'=>'nMultTipoID',
                                	'label'=>'NMultTipoID',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nMultCategID',
                                	'label'=>'NMultCategID',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultLinkMiniatura',
                                	'label'=>'CMultLinkMiniatura',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultLink',
                                	'label'=>'CMultLink',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultTitulo',
                                	'label'=>'CMultTitulo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultDescripcion',
                                	'label'=>'CMultDescripcion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultFechaRegistro',
                                	'label'=>'CMultFechaRegistro',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultFechaInicial',
                                	'label'=>'CMultFechaInicial',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nParID',
                                	'label'=>'NParID',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultEstado',
                                	'label'=>'CMultEstado',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cMultNumVisitas',
                                	'label'=>'CMultNumVisitas',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   
			   
				,

				'eventos' => array(array(
                                	'field'=>'cEveLatitud',
                                	'label'=>'CEveLatitud',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveLongitud',
                                	'label'=>'CEveLongitud',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveTitulo',
                                	'label'=>'CEveTitulo',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveDescripcion',
                                	'label'=>'CEveDescripcion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveLinkFoto',
                                	'label'=>'CEveLinkFoto',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveLinkFacebook',
                                	'label'=>'CEveLinkFacebook',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveDireccion',
                                	'label'=>'CEveDireccion',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'dEveStartTime',
                                	'label'=>'DEveStartTime',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'dEveEndTime',
                                	'label'=>'DEveEndTime',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nUbiDepartamento',
                                	'label'=>'NUbiDepartamento',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'nUbiProvincia',
                                	'label'=>'NUbiProvincia',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'nUbiDistrito',
                                	'label'=>'NUbiDistrito',
                                	'rules'=>'trim|xss_clean'
                                ),
								array(
                                	'field'=>'dEveFechaRegistro',
                                	'label'=>'DEveFechaRegistro',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'cEveEstado',
                                	'label'=>'CEveEstado',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nEveCosto',
                                	'label'=>'NEveCosto',
                                	'rules'=>'required|trim|xss_clean'
                                ),
								array(
                                	'field'=>'nUsuario',
                                	'label'=>'NUsuario',
                                	'rules'=>'required|trim|xss_clean'
                                ))
			   );
			   
?>