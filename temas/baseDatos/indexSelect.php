<?php

include "prueba1.php";

$db = conectaDB();

$nombre = "IronMan";
$velocidad = 8;

$sql = "select * from superheroe";


$resultado = $db->query($sql);

foreach ($resultado as $value) {
    echo $value["nombre"]."<br>";
}


?>