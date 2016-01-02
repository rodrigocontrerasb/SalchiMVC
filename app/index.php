<?php

// Includes
include 'utils/UtilesGeneral.php';
include 'utils/UtilesConfig.php';
include 'dao/Conn.php';
include 'business/ControllerBusiness.php';

// Ejecucion
$controllerBusiness = new ControllerBusiness();

// Controller
$params = $controllerBusiness->getParameteres();
$controllerBusiness->callController($params);





