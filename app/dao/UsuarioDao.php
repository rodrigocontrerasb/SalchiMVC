<?php

/**
 * Data Access Object: Usuario 
 * Descripcion: Acceso a datos para tabla usuario
 * Objetivo: Controlar las llamadas de ingreso y retorno de datos desde el motor Oracle
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07
 * @since 2015-12-07
 */
class UsuarioDao {

    /**
     * Funcion: listarUsuario   
     * Descripcion: Lista un Usuario
     * @param Usuario $usuario
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function listarUsuario(Usuario $usuario) {

        // Librerias
        $usuarioDao = new UsuarioDao();

        // Conexion
        $conexion = new Conn();
        $link = $conexion->Conexion();
        $strsql = "SELECT * from usuario where id_usuario = " . $usuario->getId();
        
        $result = mysql_query($strsql, $link);
        //$row = mysql_fetch_array($result, MYSQL_ASSOC);
        $row = mysql_fetch_assoc($result);

        // Creacion de Usuario
        $usuario = new Usuario();
        $usuario = $usuarioDao->toUsuario($usuario, $row);

        // Cerrar Conexion
        mysql_close($link);

        // Retorno
        return $usuario;
    }

    /**
     * Funcion: listarUsuarios   
     * Descripcion: Lista todos los usuarios
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function listarUsuarios() {

        // Librerias
        $usuarioDao = new UsuarioDao();

        // Conexion
        $conexion = new Conn();
        $link = $conexion->Conexion();
        $strsql = "SELECT * from usuario";

        // Result
        $result = mysql_query($strsql, $link);

        // Array Salida
        $x = 0;
        $arrUsuarios = array();

        //while ($row = mysql_fetch_row($result)){ 
        //while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        while ($row = mysql_fetch_assoc($result)) {

            // Creacion de Usuario
            $usuario = new Usuario();
            $usuario = $usuarioDao->toUsuario($usuario, $row);

            // Agregar al array de salida;
            $arrUsuarios[$x] = $usuario;
            $x++;
        }

        // Cerrar Conexion
        mysql_close($link);

        // Retorno
        return $arrUsuarios;
    }

    /**
     * Funcion: crearUsuario   
     * Descripcion: Crea un usuario
     * @param Usuario $usuario
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function crearUsuario(Usuario $usuario) {

        // Conexion
        $conexion = new Conn();
        $link = $conexion->Conexion();

        // Consulta SQL
        $sql = "INSERT INTO usuario (nombres_usuario,paterno_usuario, materno_usuario) VALUES ('" . $usuario->getNombres() . "' , '" . $usuario->getPaterno() . "' , '" . $usuario->getMaterno() . "' )";

        $result = mysql_query($sql, $link);

        if (!$result) {
            die('Could not enter data: ' . mysql_error());
        }
        echo "Entered data successfully\n";

        // Objeto Usuario
        $usuario->setId(mysql_insert_id());

        // Cerrar Conexion
        mysql_close($link);

        // Retorna Usuario Creado
        return $usuario;
    }

    /**
     * Funcion: modificarUsuario   
     * Descripcion: Modifica un Usuario
     * @param Usuario $usuario
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function modificarUsuario(Usuario $usuario) {

        // Conexion
        $conexion = new Conn();
        $link = $conexion->Conexion();

        $sql = "UPDATE usuario SET nombres_usuario='" . $usuario->getNombres() . "' WHERE id_usuario=" . $usuario->getId();

        $retval = mysql_query($sql, $link);
        if (!$retval) {
            die('Could not update data: ' . mysql_error());
        }
        echo "Updated data successfully\n";

        // Cerrar Conexion
        mysql_close($link);

        // Retorno
        return $usuario;
    }

    /**
     * Funcion: eliminarUsuario   
     * Descripcion: Elimina un Usuario
     * @param Usuario $usuario 
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function eliminarUsuario(Usuario $usuario) {

        // Conexion
        $conexion = new Conn();
        $link = $conexion->Conexion();

        // Consulta 
        $sql = 'DELETE FROM usuario WHERE id_usuario=' . $usuario->getId();

        $retval = mysql_query($sql, $link);
        if (!$retval) {
            die('Could not delete data: ' . mysql_error());
        }
        echo "Deleted data successfully\n";

        // Cerra Conexion
        mysql_close($link);

        // Retorno
        return $usuario;
    }

    /**
     * Funcion: toUsuario   
     * Descripcion: Agrega al objeto usuario los campos respectivos desde BD
     * @param Usuario $usuario, $row
     * @return List<Unidad>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function toUsuario(Usuario $usuario, $row) {

        try {
            $usuario->setId($row['id_usuario']);
        } catch (Exception $ex) {
            
        }

        try {
            $usuario->setNombres($row['nombres_usuario']);
        } catch (Exception $ex) {
            
        }

        try {
            $usuario->setPaterno($row['paterno_usuario']);
        } catch (Exception $ex) {
            
        }

        try {
            $usuario->setMaterno($row['materno_usuario']);
        } catch (Exception $ex) {
            
        }

        // Retorno
        return $usuario;
    }

}
