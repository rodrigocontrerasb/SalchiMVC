<?php

// Includes
include 'app/utils/UtilesGeneral.php';
include 'app/utils/UtilesConfig.php';
include 'app/dao/Conn.php';
include 'app/business/ControllerBusiness.php';

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





