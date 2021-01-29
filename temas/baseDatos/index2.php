<?php

include "prueba1.php";

$db = conectaDB();

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

$procesarFormulario = false;

$valorNombre;
$errorNombre = "";

$valorVelocidad;
$errorVelocidad = "";

if(isset($_POST["insertar"])){

    $procesarFormulario = true;
    $valorNombre = filtrado($_POST["nombreSuperheroe"]);
    $valorVelocidad = filtrado($_POST["velocidadSuperheroe"]);
    
    if(empty($valorNombre)){
        $procesarFormulario = false;
        $errorNombre = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorVelocidad)){
        $procesarFormulario = false;
        $errorVelocidad = "Error, este campo no puede quedar vacio.";
    }
}

if(isset($_GET["id"])){

    $sql = "delete from superheroe where id = ".$_GET['id']."";
    $consulta = $db->prepare($sql);
    $consulta->execute();
}

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gestión Superheroes</title>
        <link rel="stylesheet" href="css/estilosSuma.css">
    </head>
    <body>
        <h2 style="text-align: center">Gestión De Superhéroes</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="text-align: center">
            <?php

                echo "<input type='text' name='nombreSuperheroe'  placeholder='Nombre Superheroe'>";
                ?><span style="color:red;"><?php   echo $errorNombre;?></span><br><br><?php
                echo "<input type='number' name='velocidadSuperheroe'  placeholder='Velocidad Superheroe'>";
                ?><span style="color:red;"><?php   echo $errorVelocidad;?></span><?php
                echo "<p style='text-align: center'><input type='submit' name='insertar' value='Insertar' /></p>";
            ?>
        </form>

<?php


if($procesarFormulario){
    
    $sql = "Insert into superheroe (nombre,velocidad) values (:nombre,:velocidad)";
    $consulta = $db->prepare($sql);
    $aParametros = array(":nombre"=>$_POST["nombreSuperheroe"],
                        ":velocidad"=>$_POST["velocidadSuperheroe"]);

    if($consulta->execute($aParametros)){
        echo "<p style='text-align: center'>Superheroe insertado con exito</p>";
    }else{
        echo "<p style='text-align: center'>El Superheroe no se pudo insertar</p>";
    }
}

echo "<h2>Listado de Superhéroes</h2>";

    $sql = "SELECT * FROM SUPERHEROE";
    $consulta = $db->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll();
    echo "<table>";
    foreach ($resultado as $valor) {
        echo "<tr><td>". $valor['nombre']."</td>";
        echo "<td><a href='modificar.php?id=".$valor['id']."'>edit</a></td>";
        echo "<td><a href='index.php?id=".$valor['id']."' name = 'borrar'>del</a></td>";
        echo "</tr>";
    }
    echo "</table>";

?>