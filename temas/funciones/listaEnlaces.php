<?php

    /**
     * Función para factorizar un número
     * @param numero Introducido por un formulario
     */

    $listaEnlaces = array("Enlace 1", "Enlace 2", "Enlace 3", "Enlace 4", "Enlace Final");

    function generarEnlaces($array){
        echo "<ul>";
        for ($i=0; $i < count($array); $i++) { 
            echo "<li><a href=\"$array[$i].html\">$array[$i]</a></li>";
        }
        echo "</ul>";
    }
    
    generarEnlaces($listaEnlaces);

?>
