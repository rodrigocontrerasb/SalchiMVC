<?php

/**
 * Utiles: UtilesGeneral 
 * Descripcion: Seteo de Opciones de Inicio
 * Objetivo: Mantener todas las funciones generales dentro de un mismo objeto del tipo utiles
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-10
 * @since 2015-12-10
 */
class UtilesGeneral {

    /**
     * Funcion: initSet   
     * Descripcion: Setea el display de errores en PHP
     * @return -
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-10
     * @since 2015-12-10
     */
    public function initSet() {

        // Display Errores
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

}

// Seteo de Inicio
$utilesgeneral = new UtilesGeneral();
$utilesgeneral->initSet();
