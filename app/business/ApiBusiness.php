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

        // Librerias Adicionales
        $usuarioBusiness = new UsuarioBusiness();

        // Almacena el request
        $request = $this->setRequest();

        // Caso Error, no existe accion
        if ($api->getTipo() == "Error") {
            $salida = $api;
        } else {
            $metodo = null;
            $salida = 'Seleccione un metodo';
        }

        // Ejecucion de Funciones (Este obejto a depender del tipo de llamado 'model=usuario')
        $usuario = new Usuario();
        $usuario = $usuarioBusiness->requestToUsuario($request);

        // Llamado Metodo
        $metodo = $api->getAccion();
        if ($metodo != null) {
            $salida = $usuarioBusiness->$metodo($usuario);
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

        if (isset($request['accion'])) {
            $api->setAccion($request['accion']);
        } else {
            $api->setTipo("Error");
            $api->setMensaje("No ha ingresado accion a realizar");
        }
    }

    /**
     * Funcion: goFunction   
     * Descripcion: Envia a la funcion asociada a la accion por parametro
     * @param api $api
     * @return $salida
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function goFunction(api $api) {

        $salida = $this->getFunction($api);
        return $salida;
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
