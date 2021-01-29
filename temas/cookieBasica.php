


<?php

session_start();

$valorUsuario ="";
$valorPass="";
$aut=false;


if(!isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = "invitado";
}

if(isset($_POST["submit"])){
    
    setcookie('usuario', '', time() - 1);

    $valorUsuario = $_POST["usuario"];
    $valorPass = $_POST["pass"];
    
    if($valorUsuario == "loji" && $valorPass == "romano"){

        $aut = true;
        $_SESSION["usuario"] = "usuario";
        
        if(isset($_POST["cookie"])){
            setcookie("usuario",$_POST['usuario']);
        }
        else{
            setcookie('usuario', '', time() - 1);
        }
    }
}

    if(!$aut && $_SESSION["usuario"] != "usuario"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form style="text-align:center; margin-top:200px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <?php

        if(isset($_COOKIE["usuario"])){

        ?>

        <input type="text" name="usuario" value="<?php echo $_COOKIE["usuario"]?>" placeholder="Usuario"><br><br>
    <?php
    }else{
        ?>

            <input type="text" name="usuario" value="" placeholder="Usuario"><br><br>
        <?php
    }
    ?>
        <input type="text" name="pass" placeholder="Contraseña"><br><br>
        <input type="checkbox" name="cookie" ><br><br>
        <input type="submit" name="submit">
        <a href='cerrarSesionCookie.php' >Finalizar Partida</a>                       

    </form>
</body>
</html>
<?php

    }else{
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    HOLA

    <a href='cerrarSesionCookie.php' >Finalizar Partida</a>                       

</body>
</html>

        <?php
    }

    ?>

