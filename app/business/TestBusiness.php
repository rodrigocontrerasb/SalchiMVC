<?php

/**
 * Business: Test 
 * Descripcion: Business para Test
 * Objetivo: Solo es un ejemplo simple de uso y creacion de un business
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-30
 * @since 2015-12-30
 */
class TestBusiness {

    /**
     * Funcion: listarNombres   
     * Descripcion: Solo es un ejemplo simple de funcion
     * @param --
     * @return $arr
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07 - Version Inicial
     * @since 2015-12-07
     */
    public function listarNombres() {

        $arr[0] = 'Primer Nombre';
        $arr[1] = 'Segundo Nombre';
        $arr[2] = 'Tercer Nombre';

        return $arr;
    }

}
