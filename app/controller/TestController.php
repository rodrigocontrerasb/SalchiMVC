<?php

/**
 * Controller: Test 
 * Descripcion: Controlador para la clase del tipo Test
 * Objetivo: Disponibilizar los llamados de funciones en el controlador
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-30
 * @since 2015-12-30
 */
class TestController {

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
        include 'view/test/index.php';
    }

}
