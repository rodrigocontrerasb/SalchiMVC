<?php

/**
 * Api: ApiFunciones 
 * Descripcion: Registra los metodos visibles desde la API
 * Objetivo: Registra los metodos visibles desde la API
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07
 * @since 2015-12-07
 */
class ApiFunciones {

    /**
     * Funcion: getFunction   
     * Descripcion: Dirige la peticion a la funcion correspondiente
     * @param index $index
     * @return $salida
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @version 2015-12-29 - Simplificacion metodo de llamados
     * @since 2015-12-07
     */
    function getFunction(index $index) {

        // Librerias
        $usuarioBusiness = new UsuarioBusiness();

        // Request
        $request = $index->setRequest();

        // Caso Error, no existe accion
        if ($index->getTipo() == "Error") {
            $salida = $index;
        } else {
            $metodo = null;
            $salida = 'Seleccione un metodo';
        }

        // Ejecucion de Funciones
        $usuario = new Usuario();
        $usuario = $usuarioBusiness->requestToUsuario($request);

        // Llamado Metodo
        $metodo = $index->getAccion();
        if ($metodo != null) {
            $salida = $usuarioBusiness->$metodo($usuario);
        }

        // Retorno
        return $salida;
    }

}
