<?php

session_start();

$_SESSION["rol"] = "invitado";

$aut = false;

$usuario = "";
$errorUsuario = "";

$pass = "";
$errorPass = "";

$procesarFormulario = false;

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

if(isset($_POST["enviar"])){

    
    $usuario = filtrado($_POST["usuario"]);
    $pass = filtrado($_POST["pass"]);

    if($usuario == "admin" && $pass == "admin"){
        $aut = true;
        $_SESSION["rol"] = "admin";
    }

    if(empty($usuario)){
        $aut = false;
        $errorUsuario = "Error, este campo no puede quedar vacio.";
    }

    if(empty($pass)){
        $aut = false;
        $errorPass = "Error, este campo no puede quedar vacio.";
    }
}

if(!$aut){

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
            <h1>Autentificación Básica</h1>
            <h3>Usted tiene iniciada una sesión como <?php echo $_SESSION["rol"] ?></h3>
            <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                <p><input type = "text" name = "usuario" placeholder = "Usuario" value = "<?php echo $usuario ?>" />
                <span style="color:red;"><?php   echo $errorUsuario;?></span></p>
    
                <p><input type = "text" name = "pass" placeholder = "Contraseña" value = "<?php echo $pass ?>" />
                <span style="color:red;"><?php   echo $errorPass;?></span></p>
    
                <p><input type = "submit" name = "enviar" value = "Enviar" /></p>
    
            </form>
        </body>
    </html>

<?php

}else{

    header("Location: privado.php");

}

?>