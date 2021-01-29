<?php

/**
 * 
 * 1. Desarrolla una aplicación que genere un script para cración de usuarios a partir de un fichero.
 * 
 * @author Javier lopera
 * 
 */

$fileLectura=fopen("ficheroAlumnos.txt","r") or exit("Unable to open file!");

$contador = 0;

$arrayUsuarios = [];

function normaliza($cadena){
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

do{
    $cadenaNombre = fgets($fileLectura);
    $cadenaReducida = normaliza(strtolower($cadenaNombre));


    if($contador>7){
        $cadenaCompleta = explode(" ",$cadenaReducida);
        
        $usuario = substr($cadenaCompleta[0], 0, 2).substr($cadenaCompleta[1], 0, 2).substr($cadenaCompleta[2], 0, 2);
        // echo $cadenaCompleta;
        // print_r($cadenaCompleta);
        echo $usuario . "<br>";
        array_push($arrayUsuarios,$usuario);
    }
    $contador++;
}while(!feof($fileLectura));


fclose($fileLectura);

 ?>