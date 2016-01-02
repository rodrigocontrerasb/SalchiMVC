<?php

class UsuarioController {

    function index() {

        // llamado a la vista
        include 'view/usuario/index.php';
    }

    function listarUsuarios() {

        // Generacion Data
        $usuarioBusiness = new UsuarioBusiness();
        $data['usuarios'] = $usuarioBusiness->listarUsuarios();

        // llamado a la vista
        include 'view/usuario/listarUsuarios.php';
    }

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
