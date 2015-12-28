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
     * @version 2015-12-07
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
        }

        // Funciones Disponibles
        // 
        // Usuario -------------------------------------------------------------
        // Listar Usuario
        if ($index->getAccion() == "listarUsuario") {
            $usuario = new Usuario();
            $usuario = $usuarioBusiness->requestToUsuario($request);
            $salida = $usuarioBusiness->listarUsuario($usuario);
        }

        // Listar Usuarios
        if ($index->getAccion() == "listarUsuarios") {
            $salida = $usuarioBusiness->listarUsuarios();
        }

        // Crear Usuario
        if ($index->getAccion() == "crearUsuario") {
            $usuario = new Usuario();
            $usuario = $usuarioBusiness->requestToUsuario($request);
            $salida = $usuarioBusiness->crearUsuario($usuario);
        }

        // Modificar Usuario
        if ($index->getAccion() == "modificarUsuario") {
            $usuario = new Usuario();
            $usuario = $usuarioBusiness->requestToUsuario($request);
            $salida = $usuarioBusiness->modificarUsuario($usuario);
        }

        // Eliminar Usuario
        if ($index->getAccion() == "eliminarUsuario") {
            $usuario = new Usuario();
            $usuario = $usuarioBusiness->requestToUsuario($request);
            $salida = $usuarioBusiness->eliminarUsuario($usuario);
        }

        // Otras ---------------------------------------------------------------

        return $salida;
    }

}
