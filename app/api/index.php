<?php

include '../utils/UtilesGeneral.php';
include '../utils/UtilesConfig.php';
include '../model/Api.php';
include '../model/Usuario.php';
include '../business/ApiBusiness.php';
include '../business/UsuarioBusiness.php';
include '../dao/UsuarioDao.php';
include '../dao/Conn.php';

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

// Llamado a funcion
$salida = $apiBusiness->goFunction($api);

// Salida de Valores
$apiBusiness->verSalida($salida, $api);
