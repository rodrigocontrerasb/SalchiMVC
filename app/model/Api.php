<?php

/**
 * Modelo: Api
 * Descripcion: Representación en clase para el manejo de objeto api
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-30
 * @since 2015-12-30
 */
class Api {

    // Parametros
    public $accion;
    public $controller;
    public $tipo;
    public $mensaje;

    // Getters y Seters
    function getController() {
        return $this->controller;
    }

    function setController($controller) {
        $this->controller = $controller;
    }

    
    function getAccion() {
        return $this->accion;
    }

    function setAccion($accion) {
        $this->accion = $accion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

}
