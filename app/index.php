<?php

// Includes
include 'utils/UtilesGeneral.php';
include 'utils/UtilesConfig.php';
include 'dao/Conn.php';
include 'business/ControllerBusiness.php';

/**
 * Ejecucion: Proceso de Ejecucion Controlador  
 * Descripcion: Concentra y distribuye los llamdos desde la web al controlador
 * @param controller, action
 * @return page vista
 * @throws Exception
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-01-01 - Version Inicial
 * @since 2016-01-01
 */
$controllerBusiness = new ControllerBusiness();

// Controller
$params = $controllerBusiness->getParameteres();
$controllerBusiness->callController($params);





