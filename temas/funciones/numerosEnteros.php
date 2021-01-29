<?php

$numeros = [1,2,3,4,5,6,7,8,50];

$cuadrados = array_map(function ($numero){
    return $numero * $numero;
},$numeros);



print_r($cuadrados);
?>