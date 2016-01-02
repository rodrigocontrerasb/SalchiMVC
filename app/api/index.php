<?php

include '../utils/UtilesGeneral.php';
include '../utils/UtilesConfig.php';
include '../dao/Conn.php';
include '../model/Api.php';
include '../business/ApiBusiness.php';


/**
 * Ejecucion: Proceso de Ejecucion API, librerias y clases  
 * Descripcion: Ejeucta la API para llamado de funciones
 * @param Usuario $usuario
 * @return JSON
 * @throws Exception
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07 - Version Inicial
 * @version 2015-12-30 - Se controla por medio de objeto api
 * @since 2015-12-07
 */
$api = new Api();
$apiBusiness = new ApiBusiness();

// Seteao de Parametros Get y/o Post
$apiBusiness->setParameters($api);

// Includes
$apiBusiness->setIncludes($api);

// Llamado a funcion
$salida = $apiBusiness->getFunction($api);

// Salida de Valores
$apiBusiness->verSalida($salida, $api);
