<?php

class ControllerBusiness {

    function getParameteres() {

        if (!isset($_GET['controller'])) {
            echo 'No se ha especificado controlador';
            exit;
        }

        if (!isset($_GET['action'])) {
            $_GET['action'] = 'index';
        }

        return $_GET;
    }

    function includes($params) {

        // Includes
        if (file_exists('model/' . $params['controller'] . '.php')) {
            include 'model/' . $params['controller'] . '.php';
        }

        if (file_exists('business/' . $params['controller'] . 'Business.php')) {
            include 'business/' . $params['controller'] . 'Business.php';
        }

        if (file_exists('dao/' . $params['controller'] . 'Dao.php')) {
            include 'dao/' . $params['controller'] . 'Dao.php';
        }

        if (file_exists('controller/' . $params['controller'] . 'Controller.php')) {
            include 'controller/' . $params['controller'] . 'Controller.php';
        }
    }

    function callController($params) {

        $this->includes($params);

        //$usuarioController = new usuarioController();
        //$usuarioController->$params['method']($params);

        $obj = $params['controller'] . 'Controller';
        $objController = new $obj();
        $objController->$params['action']($params);
    }

}
