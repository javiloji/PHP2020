<?php

// 1. Meses del año.

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

echo "<br><br>";
foreach ($meses as $indice => $mes) {
    echo $indice+1 .". $mes<br>";
}