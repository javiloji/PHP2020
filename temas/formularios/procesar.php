<?php

if(!isset($_POST['enviar'])){
    header("Location: pruebaFormulario.php");
    echo "Acceso no autorizado";
}
else{
    echo $_POST["nombre"];
    echo "<br>";
    echo $_POST["apellidos"];
}


?>