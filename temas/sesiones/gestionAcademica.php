<?php

/**
 * 2. Crear una pequeña aplicación que permita la gestión académica del módulo de DWES. 
 * Interesa almacenar las notas de cada trimestre y mostrar un informe con la nota media.
 */

session_start();

$procesarFormulario = false;

$valorNombre = "";
$errorNombre = "";

$valorApellido1 = "";
$errorApellido1 = "";

$valorApellido2 = "";
$errorApellido2 = "";

$valorNota1 = "";
$errorNota1 = "";

$valorNota2 = "";
$errorNota2 = "";

$valorNota3 = "";
$errorNota3 = "";




function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

if(isset($_POST["annadirNotas"])){
    
    $procesarFormulario = true;
    $valorNombre = filtrado($_POST["nombre"]);
    $valorApellido1 = filtrado($_POST["apellido1"]);
    $valorApellido2 = filtrado($_POST["apellido2"]);
    $valorNota1 = filtrado($_POST["nota1"]);
    $valorNota2 = filtrado($_POST["nota2"]);
    $valorNota3 = filtrado($_POST["nota3"]);

    if(empty($valorNombre)){
        $procesarFormulario = false;
        $errorNombre = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorApellido1)){
        $procesarFormulario = false;
        $errorApellido1 = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorApellido2)){
        $procesarFormulario = false;
        $errorApellido2 = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorNota1)){
        $procesarFormulario = false;
        $errorNota1 = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorNota2)){
        $procesarFormulario = false;
        $errorNota2 = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorNota3)){
        $procesarFormulario = false;
        $errorNota3 = "Error, este campo no puede quedar vacio.";
    }
}

if($procesarFormulario){

}

?>




<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/estilosSuma.css">
    </head>
    <body>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">

            <p>Introduce los datos requeridos:</p>

            <p><input type = "text" name = "nombre" placeholder = "Nombre" value = "<?php echo $valorNombre ?>" />
            <span style="color:red;"><?php   echo $errorNombre;?></span></p>

            <p><input type = "text" name = "apellido1" placeholder = "Apellido1" value = "<?php echo $valorApellido1 ?>" />
            <span style="color:red;"><?php   echo $errorApellido1;?></span></p>

            <p><input type = "text" name = "apellido2" placeholder = "Apellido2" value = "<?php echo $valorApellido2 ?>" />
            <span style="color:red;"><?php   echo $errorApellido2;?></span></p>

            <p><input type = "number" name = "nota1" placeholder = "Nota Trimestre 1" value = "<?php echo $valorNota1 ?>" />
            <span style="color:red;"><?php   echo $errorNota1;?></span></p>

            <p><input type = "number" name = "nota2" placeholder = "Nota Trimestre 2" value = "<?php echo $valorNota2 ?>" />
            <span style="color:red;"><?php   echo $errorNota2;?></span></p>

            <p><input type = "number" name = "nota3" placeholder = "Nota Trimestre 3" value = "<?php echo $valorNota3 ?>" />
            <span style="color:red;"><?php   echo $errorNota3;?></span></p>

            <p><input type = "submit" name = "annadirNotas" value = "Añadir Notas" /></p>

        </form>
        <a href='logout.php' >Cerrar sesión</a>
    </body>
</html>

<?php


?>