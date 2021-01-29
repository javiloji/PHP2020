<?php

include "prueba1.php";

$db = conectaDB();

$nombre = "IronMan";
$velocidad = 8;

$sql = "insert into superheroe(nombre,velocidad) values('".$nombre."','".$velocidad."')";


if($db->query($sql)){
    echo "Fila insertada con exito";
}else{
    echo "La fila no pudo insertarse con exito";
}

// var_dump($conexion);

?>