
<?php

session_start();

if($_SESSION["rol"] != "admin"){
    header("Location: autPorPerfiles.php");
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
            <h1>PARTE PRIVADA</h1><br>
            <h3>Usted tiene iniciada una sesión como <?php echo $_SESSION["rol"] ?></h3>

            <a href='logoutBasico.php' >Cerrar sesión</a>

        </body>
    </html>