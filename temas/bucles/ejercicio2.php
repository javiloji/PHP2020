<?php

echo "2. Sumar los 3 primeros numeros pares<br><br>";

$i = 0;
$num = 0;
$suma = 0;

while ($num < 3) {

    $i++;
    if($i % 2 == 0){
        $suma += $i;
        $num++;
    };
}

echo "La suma total es : $suma ";
?>