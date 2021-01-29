<?php

/**
 * Crea un script que utilice una función anónima para generar los nombres de usuarios. 
 * El nombre de usuario se forma concatenadndo las dos primeras letras del primer apellido, 
 * las dos primeras letras del segundo apellido y la inicial del nombre.
 */

$aUsuarios = array(

    array('nombre'=>'Jesús','apellido1'=>'Martínez','apellido2'=>'García'),

    array('nombre'=>'Mercedes','apellido1'=>'Calamaro','apellido2'=>'Pedrajas'),

    array('nombre'=>'Elena','apellido1'=>'Pérez','apellido2'=>''),

    array('nombre'=>'Javier','apellido1'=>'Lopera','apellido2'=>'Jiménez'),


);

function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

$usuarios = array_map(function($usuario){
    return strtolower(substr(normaliza($usuario["apellido1"]),0,2)) ."". 
    strtolower(substr(normaliza($usuario["apellido2"]),0,2)) ."". strtolower(substr(normaliza($usuario["nombre"]),0,1));
}, $aUsuarios);

print_r($usuarios);

 ?>