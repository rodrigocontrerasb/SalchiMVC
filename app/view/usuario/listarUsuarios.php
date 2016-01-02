<?php

echo '<h1>Vista para Metodo ListarUsuarios</h1>';

//print_r($data);

for ($x = 0; $x < count($data['usuarios']); $x++) {
    echo ($data['usuarios'][$x]->getNombres() . "<br />");
    //print_r($data['usuarios'][$x]);
}