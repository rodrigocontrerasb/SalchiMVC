<?php

/**
 * Business: Api 
 * Descripcion: Funciones generales asociadas a objetos del tipo api
 * Objetivo: Entregar el conjunto de acciones para los objetos del tipo, gatilladas desde la vista
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-30
 * @since 2015-12-30
 */
class ApiBusiness {

    /**
     * Funcion: setIncludes   
     * Descripcion: Setea los includes
     * @param api $api
     * @return --
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @since 2015-12-07
     */
    function setIncludes(api $api) {

        $controller = $api->getController();

        if (file_exists('../model/' . $controller . '.php')) {
            include '../model/' . $controller . '.php';
        }

        if (file_exists('../business/' . $controller . 'Business.php')) {
            include '../business/' . $controller . 'Business.php';
        }

        if (file_exists('../dao/' . $controller . 'Dao.php')) {
            include '../dao/' . $controller . 'Dao.php';
        }
    }

    /**
     * Funcion: getFunction   
     * Descripcion: Dirige la peticion a la funcion correspondiente
     * @param api $api
     * @return $salida
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @version 2015-12-29 - Simplificacion metodo de llamados
     * @since 2015-12-07
     */
    function getFunction(api $api) {

        // Variables Generales
        $request = $this->setRequest();
        $withRequest = 0;

        // Librerias
        $controller = $api->getController();
        $controllerBusiness = $api->getController() . 'Business';

        // Crea objeto si existe la clase
        if (!class_exists($controllerBusiness)) {

            $api->setTipo("Error");
            $api->setMensaje("No existe el Controlador Asociado");
            $salida = $api;
        } else {

            // Creacion del Objeto Business correspondiente
            $objBusiness = new $controllerBusiness();

            // Creacion del objeto controlador
            if (file_exists('../model/' . $controller . '.php')) {
                $obj = new $controller();
            }

            // Verificacion de existencia business
            if (file_exists('../business/' . $controller . 'Business.php')) {

                // Identificacion de funcion requestToObjeto
                $req = 'requestTo' . $controller;

                // Verificacion de existencia de metodo dentro de clase
                if (method_exists($objBusiness, $req)) {
                    $obj = $objBusiness->$req($request);
                    $withRequest = 1;
                }
            }

            // Identificacion Metodo
            $metodo = $api->getAccion();

            if (!method_exists($objBusiness, $metodo)) {
                $api->setTipo("Error");
                $api->setMensaje("No existe el Metodo Asociado");

                $salida = $api;
            } else {

                // Llamado a metodo para salida de datos
                if ($withRequest == 1) {

                    $salida = $objBusiness->$metodo($obj);
                } else {
                    $salida = $objBusiness->$metodo();
                }
            }
        }

        // Retorno
        return $salida;
    }

    /**
     * Funcion: setParameters   
     * Descripcion: Setea los parametros para el objeto api
     * @param api $api
     * @return $salida
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function setParameters(Api $api) {

        // Obtener Request del Tipo GET o POST
        $request = $this->setRequest();

        // Verifica paso de parametros formato tipo friendlyurl
        $request = $this->getFriendly();

        // Proceso General
        if (isset($request['controller'])) {
            $api->setController($request['controller']);
        } else {
            $api->setTipo("Error");
            $api->setMensaje("No ha ingresado controlador");
        }

        if (isset($request['action'])) {
            $api->setAccion($request['action']);
        } else {
            $api->setTipo("Error");
            $api->setMensaje("No ha ingresado accion");
        }

        if ($api->getTipo() == 'Error') {
            echo json_encode($api);
            exit;
        }
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
     * Funcion: verSalida   
     * Descripcion: Genera la salida en el formato solicitado
     * @param api $api
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function verSalida($salida, api $api) {

        echo json_encode($salida);
    }

    /**
     * Funcion: setRequest   
     * Descripcion: Setea el request desde GET o POST segun corresponda
     * @param api $api
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function setRequest() {

        if (isset($_GET) or isset($_POST)) {
            if (isset($_GET)) {
                $request = $_GET;
            } else {
                $request = $_POST;
            }
        }

        // Retorno
        return $request;
    }

}
