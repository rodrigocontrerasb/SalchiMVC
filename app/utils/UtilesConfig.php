<?php

/**
 * Utiles: UtilesConfig 
 * Descripcion: Funciones utiles para la configuracion del proyecto
 * Objetivo: Mantener todas las funciones generales dentro de un mismo objeto del tipo utiles
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-10
 * @version 2015-12-28
 * @since 2015-12-10
 */
class UtilesConfig {

    // Atributos
    private $serverHost = "localhost";
    private $serverUser = "root";
    private $serverPass = "";
    private $serverDb = "test";
    private $serverMetodo = "mysqli";   //mysql, mysqli (Recomendado = mysqli)

    // Getters y Seters

    function getServerMetodo() {
        return $this->serverMetodo;
    }

    function getServerHost() {
        return $this->serverHost;
    }

    function getServerUser() {
        return $this->serverUser;
    }

    function getServerPass() {
        return $this->serverPass;
    }

    function getServerDb() {
        return $this->serverDb;
    }

    function setServerHost($serverHost) {
        $this->serverHost = $serverHost;
    }

    function setServerUser($serverUser) {
        $this->serverUser = $serverUser;
    }

    function setServerPass($serverPass) {
        $this->serverPass = $serverPass;
    }

    function setServerDb($serverDb) {
        $this->serverDb = $serverDb;
    }

    function setServerMetodo($serverMetodo) {
        $this->serverMetodo = $serverMetodo;
    }

}
