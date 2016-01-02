<?php

/**
 * Controller: Usuario 
 * Descripcion: Controlador para la clase del tipo Usuario
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-30
 * @since 2015-12-30
 */
class UsuarioController {

    /**
     * Funcion: index   
     * Descripcion: Accion por defecto - Index
     * @param --
     * @return --
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-01-01 - Version Inicial
     * @since 2016-12-01
     */
    function index() {

        // llamado a la vista
        include 'view/usuario/index.php';
    }

    /**
     * Funcion: listarUsuario   
     * Descripcion: Lista los usuarios
     * @param --
     * @return --
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-01-01 - Version Inicial
     * @since 2016-12-01
     */
    function listarUsuarios() {

        // Generacion Data
        $usuarioBusiness = new UsuarioBusiness();
        $data['usuarios'] = $usuarioBusiness->listarUsuarios();

        // llamado a la vista
        include 'view/usuario/listarUsuarios.php';
    }

    /**
     * Funcion: listarUsuario   
     * Descripcion: Lista un usuario
     * @param --
     * @return --
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2016-01-01 - Version Inicial
     * @since 2016-12-01
     */
    function listarUsuario($request) {

        // Business
        $usuario = new Usuario();
        $usuarioBusiness = new UsuarioBusiness();

        // Generacion Data
        $usuario = $usuarioBusiness->requestToUsuario($request);
        $data['usuario'] = $usuarioBusiness->listarUsuario($usuario);

        // llamado a la vista
        include 'view/usuario/listarUsuario.php';
    }

}
