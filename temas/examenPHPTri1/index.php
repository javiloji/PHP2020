<?php

include "config/arrayPreguntas.php";

$valorCookie = 1;

if(!isset($_COOKIE["test"])){
    setcookie("test", 1);
}else{
    if(isset($_POST["enviar"]) && $_COOKIE["test"]<3){
        setcookie("test",$_COOKIE["test"]+1);
    }
}

if(isset($_POST["resetearCookie"])){
    setcookie("test", 1, time()-1);
    // unset($_COOKIE["test"]);

}

$contador = 0;
$aciertos = 0;

$procesarFormulario = false;

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

if(!isset($_POST["enviar"])){
 

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
<?php

    if(!isset($_COOKIE["test"])){
        echo "Recarge la pagina para ver el primer test";
    }else{

        foreach ($aTests as $key) {

            
            if($key["idTest"] == $_COOKIE["test"]){

                foreach ($key["Preguntas"] as $preguntas) {
                    
                    echo "<h3> ". $preguntas['Pregunta']. "</h3>";

                    echo "<select name = 'preguntas$contador'>";
                    $contador++;

                foreach ($preguntas["respuestas"] as $pregunta => $respuestas) {
                        // echo "<br>";
                        // echo $respuestas;
                        echo "<option value = '$respuestas'>$respuestas</option>";

                }
                echo "</select><br>";
                }
            }
        }
    }

?>
            <p><input type = "submit" name = "enviar" value = "Enviar" /></p>
            <p><input type = "submit" name = "resetearCookie" value = "Resetear Cookie" /></p>

        </form>
    </body>
</html>


<?php
}

if(isset($_POST["enviar"])){
    // setcookie("test", 2, time()+3600);

    for ($i=0; $i < 10; $i++) { 
        if($aTests[$_COOKIE["test"]-1]["Corrector"][$i] == $_POST["preguntas$i"][0]){
            $aciertos++;
        }
    }
    if($aciertos > 7){
        echo "<h1 style='color:green;'>Has acertado $aciertos preguntas.</h1>";
    }else{
        echo "<h1 style='color:red;'>Has acertado $aciertos preguntas.</h1>";
    }

    echo "<form action = 'volver.php' method = 'post'>";

    echo "<p><input type = 'submit' name = 'enviar' value = 'Volver' /></p>";
    echo "</form>";
}



?>