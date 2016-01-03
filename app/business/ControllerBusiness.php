<?php

/**
 * Business: Controller 
 * Descripcion: Funciones generales asociadas a objetos del tipo controller
 * Objetivo: Entregar el conjunto de acciones, que finalmente seran presentadas en la vista
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2016-01-02
 * @since 2016-01-02
 */
class ControllerBusiness {

    /**
     * Funcion: getParameteres   
     * Descripcion: Obtienes los parametros de usuario hacia el controlador
     * @return $_GET
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @version 2015-12-29 - Simplificacion metodo de llamados
     * @since 2015-12-07
     */
    function getParameteres() {

        // Verificacion FrindlyURL
        $_GET = $this->getFriendly();

        // Verificacion Get
        if (!isset($_GET['controller'])) {
            echo 'ERROR: No se ha especificado controlador';
            exit;
        }

        if (!isset($_GET['action'])) {
            $_GET['action'] = 'index';
        }

        return $_GET;
    }

    /**
     * Funcion: getFriendly   
     * Descripcion: Obtienes los parametros de usuario desde frienlyurl
     * @return $_GET
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-01-03 - Version Inicial
     * @since 2016-01-03
     */
    function getFriendly() {

        // Url llamada Web
        $url = "http://" . $_SERVER['HTTP_HOST'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];

        // Verificacion de existencia Get
        if (!isset($_GET['controller'])) {

            if (strpos($url, 'index.php') !== false) {

                // Verificacion de paramatros tipo API, si existen se usan en GET
                $params = $_SERVER['REQUEST_URI'];
                $params = explode('index.php/', $params);
                if (isset($params[1])) {
                    $params = explode('/', $params[1]);
                }

                if (isset($params[0])) {
                    $_GET['controller'] = $params[0];
                }

                if (isset($params[1])) {
                    $_GET['action'] = $params[1];
                    if ($_GET['action'] == '') {
                        $_GET['action'] = 'index';
                    }
                }

                if (isset($params[2])) {
                    $_GET['id'] = $params['2'];
                }
            }
        }

        return $_GET;
    }

    /**
     * Funcion: includes   
     * Descripcion: Incluye los archivos necesarios para las clases
     * @param $params
     * @return --
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-01-02 - Version Inicial
     * @since 2016-01-02
     */
    function includes($params) {

        // Includes
        if (file_exists('app/model/' . $params['controller'] . '.php')) {
            include 'app/model/' . $params['controller'] . '.php';
        }

        if (file_exists('app/business/' . $params['controller'] . 'Business.php')) {
            include 'app/business/' . $params['controller'] . 'Business.php';
        }

        if (file_exists('app/dao/' . $params['controller'] . 'Dao.php')) {
            include 'app/dao/' . $params['controller'] . 'Dao.php';
        }

        if (file_exists('app/controller/' . $params['controller'] . 'Controller.php')) {
            include 'app/controller/' . $params['controller'] . 'Controller.php';
        }
    }

    /**
     * Funcion: callController   
     * Descripcion: Llama al controlador
     * @param $params
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @version 2016-01-02 - Agregar Validaciones
     * @since 2015-12-07
     */
    function callController($params) {

        $this->includes($params);

        //$usuarioController = new usuarioController();
        //$usuarioController->$params['method']($params);

        $obj = $params['controller'] . 'Controller';

        if (class_exists($obj)) {
            $objController = new $obj();

            if (method_exists($objController, $params['action'])) {
                $objController->$params['action']($params);
            } else {

                echo 'ERROR: No existe la accion especificada';
                exit;
            }
        } else {
            echo 'ERROR: No existe el controlador especificado';
            exit;
        }
    }

}
