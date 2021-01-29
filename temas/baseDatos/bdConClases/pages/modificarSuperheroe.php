<?php

include("../config/config.php");
include("../class/Superheroe.php");

// session_start();

$superheroe = Superheroe::getInstancia();


function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
} 

// if(isset($_GET["id"])){
//     $_SESSION["id"] = $_GET["id"];
// }

$procesarFormulario = false;

$valorNombre;
$errorNombre = "";

$valorVelocidad;
$errorVelocidad = "";


if(isset($_POST["update"])){
    
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

    if(!empty($valorNombre) && !empty($valorVelocidad)){
        
        $datos = array("id"=>$_POST["id"],"nombre"=>$valorNombre,"velocidad"=>$valorVelocidad);

        $superheroe->edit($datos);

        header("Location: ../index.php");

    }
}

// if(isset($_GET["id"])){
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
                echo "<input type='hidden' name ='id' value = '".$_GET['id']." '>";
                echo "<input type='text' name='nombreSuperheroe'  placeholder='Nombre Superheroe'>";
                ?><span style="color:red;"><?php   echo $errorNombre;?></span><br><br><?php
                echo "<input type='number' name='velocidadSuperheroe'  placeholder='Velocidad Superheroe'>";
                ?><span style="color:red;"><?php   echo $errorVelocidad;?></span><?php
                echo "<p style='text-align: center'><input type='submit' name='update' value='Modificar' /></p>";
            ?>
        </form>
    </body>
</html>

<?php
// }


?>