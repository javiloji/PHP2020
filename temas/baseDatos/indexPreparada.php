<?php

include "prueba1.php";

// Ejemplo Básico de consulta con prepare

$db = conectaDb();
$sql = "SELECT * FROM superheroe";
$consulta = $db->prepare($sql);
$consulta->execute();
$resultado = $consulta->fetchAll();

echo "<h3>Preparado Básico de consultas </h3>";
foreach ($resultado as $valor) {
    echo $valor['nombre'] . "<br>";
}
echo "<h3>Preparado con POST por interrogación</h3>";

//Dos condiciones de búsqueda con interrogación

$campo = $_POST['busqueda'] ?? 'I%';
$velocidad = $_POST['velocidad'] ?? 3;
$sql = "SELECT * FROM superheroe WHERE nombre LIKE ? AND velocidad > ?";
$consulta = $db->prepare($sql);
$consulta->execute(array($campo,$velocidad));
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de Superhéroes:$numeroRegistros<br/>";
if (!$resultado) {
    echo "Consulta vacía";
}
else {
    foreach ($resultado as $valor) {
        echo $valor['nombre']."<br/>";
    }
}

echo "<h3>Preparado con POST por nombre de parámetros</h3>";

//Dos condiciones de búsqueda con nombre de parametros

$campo = $_POST['busqueda'] ?? 'I%';
$velocidad = $_POST['velocidad'] ?? 3;
$sql = "SELECT * FROM superheroe WHERE nombre LIKE :nombre AND velocidad > :velocidad";
$consulta = $db->prepare($sql);
$aParametros = array(":nombre"=>$campo,
                     ":velocidad"=>$velocidad);
$consulta->execute($aParametros);
$resultado = $consulta->fetchAll();
$numeroRegistros = $consulta->rowCount();
echo "Listado de Superhéroes:$numeroRegistros<br/>";
if (!$resultado) {
    echo "Consulta vacía";
}
else {
    foreach ($resultado as $valor) {
        echo $valor['nombre']."<br/>";
}
}

?>