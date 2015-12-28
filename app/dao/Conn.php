<?php

/**
 * Data Access Object: Conn 
 * Descripcion: Acceso a datos para conexion
 * Objetivo: Controlar la conexion a la BD
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-09
 * @since 2015-12-09
 */
class Conn {

    /**
     * Funcion: Conexion   
     * Descripcion: Genera la conexion con el motor de datos MySQL
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-09
     * @since 2015-12-09
     */
    public function Conexion() {

        // Librerias
        $utilesconfig = new UtilesConfig();

        // Conexion
        if ($utilesconfig->getServerMetodo() == "mysqli") {

            $link = mysqli_connect($utilesconfig->getServerHost(), $utilesconfig->getServerUser(), $utilesconfig->getServerPass());
            mysqli_select_db($link, $utilesconfig->getServerDb());
        } else {

            $link = mysql_connect($utilesconfig->getServerHost(), $utilesconfig->getServerUser(), $utilesconfig->getServerPass());
            mysql_select_db($utilesconfig->getServerDb(), $link);
        }

        // Retorno
        return $link;
    }

    /**
     * Funcion: query   
     * Descripcion: Ejecuta la consulta SQL en la BD
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-28
     * @since 2015-12-28
     */
    public function query($link, $strsql) {

        $utilesconfig = new UtilesConfig();

        if ($utilesconfig->getServerMetodo() == "mysqli") {

            $result = mysqli_query($link, $strsql);
        } else {

            $result = mysql_query($strsql, $link);
        }

        return $result;
    }

    /**
     * Funcion: fetch_assoc   
     * Descripcion: Recorre la salida de datos desde la BD
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-28
     * @since 2015-12-28
     */
    public function fetch_assoc($result) {

        //while ($row = mysql_fetch_row($result)){ 
        //while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        //while ($row = mysqli_fetch_assoc($result)) {

        $utilesconfig = new UtilesConfig();

        if ($utilesconfig->getServerMetodo() == "mysqli") {

            $row = mysqli_fetch_assoc($result);
        } else {

            $row = mysql_fetch_assoc($result);
        }

        return $row;
    }

    /**
     * Funcion: close   
     * Descripcion: Cierra la conexion desde la BD
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-28
     * @since 2015-12-28
     */
    public function close($link) {

        $utilesconfig = new UtilesConfig();

        if ($utilesconfig->getServerMetodo() == "mysqli") {

            mysqli_close($link);
        } else {

            mysql_close($link);
        }
    }

    /**
     * Funcion: error   
     * Descripcion: presenta el codigo de error MySQL
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-28
     * @since 2015-12-28
     */
    public function error() {

        $utilesconfig = new UtilesConfig();

        if ($utilesconfig->getServerMetodo() == "mysqli") {

            $error = mysqli_error();
        } else {

            $error = mysql_error();
        }

        return $error;
    }

    /**
     * Funcion: insert_id   
     * Descripcion: Entrega el ID del registro insertado en la BD
     * @return Connection conn
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-28
     * @since 2015-12-28
     */
    public function insert_id($link) {

        $utilesconfig = new UtilesConfig();

        if ($utilesconfig->getServerMetodo() == "mysqli") {

            $id = mysqli_insert_id($link);
        } else {

            $id = mysql_insert_id();
        }

        return $id;
    }

}
