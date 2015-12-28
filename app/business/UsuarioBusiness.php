<?php

/**
 * Business: Usuario 
 * Descripcion: Funciones generales asociadas a objetos del tipo usuario
 * Objetivo: Entregar el conjunto de acciones para los objetos del tipo, gatilladas desde la vista
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07
 * @since 2015-12-07
 */
class UsuarioBusiness {

    /**
     * Funcion: listarUsuario_   
     * Descripcion: Lista un usuario
     * @param Usuario $usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function listarUsuario_(Usuario $usuario) {
        return ($usuario->getNombres() . " " . $usuario->getPaterno() . " " . $usuario->getMaterno());
        //return $usuario;
    }

    /**
     * Funcion: listarUsuario   
     * Descripcion: Lista un usuario
     * @param Usuario $usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function listarUsuario(Usuario $usuario) {
        $usuarioDao = new UsuarioDao();
        return $usuarioDao->listarUsuario($usuario);
    }

    /**
     * Funcion: listarUsuarios   
     * Descripcion: Lista los usuarios
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function listarUsuarios() {
        $usuarioDao = new UsuarioDao();
        return ($usuarioDao->listarUsuarios());
    }

    /**
     * Funcion: crearUsuario   
     * Descripcion: Crea un usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function crearUsuario(Usuario $usuario) {
        $usuarioDao = new UsuarioDao();
        return ($usuarioDao->crearUsuario($usuario));
    }

    /**
     * Funcion: modificarUsuario   
     * Descripcion: Modifica un usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function modificarUsuario(Usuario $usuario) {
        $usuarioDao = new UsuarioDao();
        return ($usuarioDao->modificarUsuario($usuario));
    }

    /**
     * Funcion: eliminarUsuario   
     * Descripcion: Elimina un usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function eliminarUsuario(Usuario $usuario) {
        $usuarioDao = new UsuarioDao();
        return ($usuarioDao->eliminarUsuario($usuario));
    }

    /**
     * Funcion: requestToUsuario   
     * Descripcion: Asigna request al usuario
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function requestToUsuario($request) {

        // Creacion de Objeto Usuario
        $usuario = new Usuario();

        if (isset($request['id'])) {
            $usuario->setId($request['id']);
        }

        if (isset($request['nombres'])) {
            $usuario->setNombres($request['nombres']);
        }

        if (isset($request['paterno'])) {
            $usuario->setPaterno($request['paterno']);
        }

        if (isset($request['materno'])) {
            $usuario->setMaterno($request['materno']);
        }

        if (isset($request['nickname'])) {
            $usuario->setNickname($request['nickname']);
        }

        // Retorno
        return $usuario;
    }

}
