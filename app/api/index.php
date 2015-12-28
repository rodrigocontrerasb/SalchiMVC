<?php

//include '../utils/UtilesGeneral.php';
include '../model/Usuario.php';
include '../business/UsuarioBusiness.php';
include '../dao/UsuarioDao.php';
include '../dao/Conn.php';
include '../utils/UtilesConfig.php';
include './ApiFunciones.php';

/**
 * Api: index 
 * Descripcion: Controla el acceso a la API
 * Objetivo: Controla el acceso a la API
 * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
 * @version 2015-12-07
 * @since 2015-12-07
 */
class index {

    // Parametros
    public $accion;
    public $tipo;
    public $mensaje;

    // Getters y Seters
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

    // Funciones
    public function setParameters(index $index) {

        // Obtener Request del Tipo GET o POST
        $request = $index->setRequest();

        if (isset($request['accion'])) {
            $index->setAccion($request['accion']);
        } else {

            $index->setTipo("Error");
            $index->setMensaje("No ha ingresado accion a realizar");
        }
    }

    /**
     * Funcion: goFunction   
     * Descripcion: Envia a la funcion asociada a la accion por parametro
     * @param index $index
     * @return $salida
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function goFunction(index $index) {

        $apifunciones = new ApiFunciones();
        $salida = $apifunciones->getFunction($index);
        return $salida;
    }

    /**
     * Funcion: verSalida   
     * Descripcion: Genera la salida en el formato solicitado
     * @param index $index
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function verSalida($salida, index $index) {
        
        echo json_encode($salida);
    }

    /**
     * Funcion: setRequest   
     * Descripcion: Setea el request desde GET o POST segun corresponda
     * @param index $index
     * @return List<Usuario>
     * @throws Exception
     * @author Rodrigo Contreras B. <rodrigo.rcb@gmail.com>
     * @version 2015-12-07
     * @since 2015-12-07
     */
    public function setRequest() {

        if (isset($_GET) or isset($_POST)) {
            if (isset($_GET)) {
                $request = $_GET;
            } else {
                $request = $_POST;
            }
        }

        // Retorno
        return $request;
    }

}

// Proceso de Ejecucion API
// Creacion Objeto index de API
$index = new index();

// Seteao de Parametros
$index->setParameters($index);

// Llamado a funcion
$salida = $index->goFunction($index);

//Salida de Valores
$index->verSalida($salida, $index);
