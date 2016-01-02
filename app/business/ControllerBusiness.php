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
