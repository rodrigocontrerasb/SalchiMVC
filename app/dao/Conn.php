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
     * Descripcion: Genera la conexion con el motor de datos Oracle
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
        $link = mysql_connect($utilesconfig->getServerHost(), $utilesconfig->getServerUser(), $utilesconfig->getServerPass());
        mysql_select_db($utilesconfig->getServerDb(), $link);

        // Retorno
        return $link;
    }

}
