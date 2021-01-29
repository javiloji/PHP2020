<?php

/**
 * 
 * Crear un script para sumar una serie de números. 
 * El número de números a sumar será introducido en un formulario.
 * 
 * @author Javier Lopera Jimenez
 * 
*/

$procesarFormulario = false;

$numeroDeInputs = 0;

$errorNumeroInicial = "";

$valores = array();

$errorSumandos = array();

$procesarSuma = false;

$resultadoSuma = 0;

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

// Validar el primer submit

if(isset($_POST["submit"])){
    $procesarFormulario = true;
    $numeroDeInputs = filtrado($_POST["numeroDeInputs"]);

    if(empty($numeroDeInputs)){
        $procesarFormulario = false;
        $errorNumeroInicial = " ! Este campo no puede estar vacio.";
    }
    if($numeroDeInputs<0){
        $procesarFormulario = false;
        $errorNumeroInicial = " ! Este campo no puede ser negativo.";
    }
}

// Inicializar los valores de los arrays de errores y de valores

if($procesarFormulario){
    for($i = 0;$i<$numeroDeInputs;$i++){
        $valores[$i] = 0;
        $errorSumandos[$i]="";
    }
}

// Validar el boton sumar

if(isset($_POST["sumar"])){
    $numeroDeInputs = filtrado($_POST["numeroDeInputs"]);
    $procesarFormulario = true;
    $procesarSuma = true;
    $valores = $_POST["numeros"];
    for($i=0;$i<$numeroDeInputs;$i++){
        $errorSumandos[$i] = "";
        if(empty($valores[$i])){
            $errorSumandos[$i] = " ! Este campo no puede estar vacio.";
            $procesarSuma = false;
        }
    }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <p>Indica cuántos numeros quieres sumar
        <input type="number" name="numeroDeInputs" value="<?php echo $numeroDeInputs ?>">
        <span class="error"><?php   echo $errorNumeroInicial;?></span></p>
        <p><input type="submit" name="submit" value="Generar Inputs"/></p>
        </form>
    <?php
    if($procesarFormulario){
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php
    
        for($i = 0;$i<$numeroDeInputs;$i++){
            echo "<p>Introduce el número ".($i+1)." : <input type=\"number\" 
            name=\"numeros[]\" value=\"".$valores[$i]."\"></input><span class=\"error\">".$errorSumandos[$i]."</span></p><br>";
        }
    
    ?>
       <input type="hidden" value = " <?php echo $numeroDeInputs ?>" name = "numeroDeInputs">

        <br><p><input type="submit" name="sumar" value="Sumar"/></p>
        </form>
        <?php
    }
    if($procesarSuma){
        for($i=0;$i<$numeroDeInputs;$i++){
            $resultadoSuma =$resultadoSuma + $valores[$i];
            
        }
        echo "<br><p>El resultado es : $resultadoSuma</p>";    }

    ?>
        
    </body>
    </html>
    
        <?php
        echo ("<br/><button><a href="."../verCodigo.php?src=".__FILE__.">
        Ver Codigo</a></button><br/>");
        
?>