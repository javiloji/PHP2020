
<?php

$valorNombre = "";
$valorApellidos = "";
$valorEmail = "";
$valorNivelIngles = "";

$valorBici = "";
$valorAndando = "";
$valorCoche = "";

$errorNombre = "";
$errorApellidos = "";
$errorEmail = "";
$errorNivelIngles = "";

$procesarFormulario = false;

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

if(isset($_POST["enviar"])){
    $procesarFormulario = true;
    $valorNombre = filtrado($_POST["nombre"]);
    $valorApellidos = filtrado($_POST["apellidos"]);
    $valorEmail = filtrado($_POST["email"]);

    if(empty($valorNombre)){
        $procesarFormulario = false;
        $errorNombre = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorApellidos)){
        $procesarFormulario = false;
        $errorApellidos = "Error, este campo no puede quedar vacio.";
    }

    if(empty($valorEmail)){
        $procesarFormulario = false;
        $errorEmail = "Error, este campo no puede quedar vacio.";
    }

    if(empty($_POST["nivelIngles"])){
        $procesarFormulario = false;
        $errorNivelIngles = "Error, este campo no puede quedar vacio.";
    }

    if(!empty($_POST["bici"])){
        $valorBici = $_POST["bici"];
    }

    if(!empty($_POST["andando"])){
        $valorAndando = $_POST["andando"];
    }

    if(!empty($_POST["coche"])){
        $valorCoche = $_POST["coche"];
    }

    if($procesarFormulario){
        echo $valorNombre . "<br>";
        echo $valorApellidos . "<br>";
        echo $valorEmail . "<br>";

        echo $_POST["genero"] . "<br>";
        echo $_POST["nivelIngles"] . "<br>";

        echo $valorBici . "<br>";
        echo $valorAndando . "<br>";
        echo $valorCoche . "<br>";
    }
}

    if(!$procesarFormulario){
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
            <p><input type = "text" name = "nombre" placeholder = "Nombre" value = "<?php echo $valorNombre ?>" />
            <span style="color:red;"><?php   echo $errorNombre;?></span></p>

            <p><input type = "text" name = "apellidos" placeholder = "Apellidos" value = "<?php echo $valorApellidos ?>" />
            <span style="color:red;"><?php   echo $errorApellidos;?></span></p>

            <p><input type = "text" name = "email" placeholder = "Email" value = "<?php echo $valorEmail ?>" />
            <span style="color:red;"><?php   echo $errorEmail;?></span></p>

            Genero: 
            <select name = "genero">
                <option value = "Masculino">Masculino</option>
                <option value = "Femenino">Femenino</option>
            <select>


            <p>Nivel de Inglés:
            <input type="radio" name="nivelIngles" value="Bajo">Bajo</input>
            <input type="radio" name="nivelIngles" value="Medio">Medio</input>
            <input type="radio" name="nivelIngles" value="Alto">Alto</input>
            <span style="color:red;"><?php   echo $errorNivelIngles;?></span>
            </p>

            Transporte:
            <p><input type="checkbox" name="bici" value="Bici">Bici</p>
            <p><input type="checkbox" name="andando" value="Andando">Andando</p>
            <p><input type="checkbox" name="coche" value="Coche">Coche</p>

            <p><input type = "submit" name = "enviar" value = "Enviar" /></p>

        </form>
    </body>
</html>

<?php
}

?>