<?php

// Includes
//include '../app/utils/UtilesGeneral.php';
include '../app/dao/Conn.php';
include '../app/utils/UtilesConfig.php';
include '../app/model/Usuario.php';
include '../app/business/UsuarioBusiness.php';
include '../app/dao/UsuarioDao.php';

// Crear Objeto Usuario
$usuario = new Usuario();
$usuarioBusiness = new UsuarioBusiness();

// Usuario 1
$usuario->setId(1);
$usuario->setNombres("Marcelo");
$usuario->setPaterno("Salas");
$usuario->setMaterno("Melinao");

// Usuario 2
$usuario2 = new Usuario();
$usuario2->setId(2);
$usuario2->setNombres("Ivan Luis");
$usuario2->setPaterno("Zamorano");
$usuario2->setMaterno("Zamora");


// Lista un Usuario
//print_r ($usuarioBusiness->listarUsuario($usuario));
// Listar Usuarios
$usuarios = $usuarioBusiness->listarUsuarios();
for ($x = 0; $x < count($usuarios); $x++) {
    //echo ($usuarios[$x]->getNombres() . "<br />");
    print_r($usuarios[$x]);
}


// Crear usuario
//print_r ($usuarioBusiness->crearUsuario($usuario));


// Modificar Usuario
//print_r ($usuarioBusiness->modificarUsuario($usuario2));


// Eliminar usuario
//print_r ($usuarioBusiness->eliminarUsuario($usuario));