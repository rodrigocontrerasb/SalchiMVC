<?php

/**
 * Modelo: Usuario
 * Descripcion: Representación en clase para tabla usuario
 * Objetivo: Controlar las llamadas de asignacion y retorno de valores para objetos del tipo
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07
 * @since 2015-12-07
 */
class Usuario {

    //Atributos de Tabla
    public $id = null;
    public $nombres = null;
    public $paterno = null;
    public $materno = null;
    public $nickname = null;

    // Getters & Setters
    function getId() {
        return $this->id;
    }

    function getNombres() {
        return $this->nombres;
    }

    function getPaterno() {
        return $this->paterno;
    }

    function getMaterno() {
        return $this->materno;
    }

    function getNickname() {
        return $this->nickname;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

    function setPaterno($paterno) {
        $this->paterno = $paterno;
    }

    function setMaterno($materno) {
        $this->materno = $materno;
    }

    function setNickname($nickname) {
        $this->nickname = $nickname;
    }

}
