<?php

/**
 * 
 * 4. Función recursiva que permita sumar los dígitos de un número pasado por la URL.
 * 
 */

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
} 

function calcularDigitos($numero){

    $sumatorio = 0;

    for ($i=0; $i < strlen($numero); $i++) { 
        $sumatorio += $numero[$i];
    }
    echo "La suma de los digitos de $numero es : $sumatorio";

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Lopera Jiménez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumaDigitos</title>
</head>
<body>
    <section>
        <?php
                if(isset($_GET["enviar"])){
                    calcularDigitos(filtrado($_GET["numero"]));
                }
                else{?>
                    <h1>Sumar Digitos</h1>
                    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "get">
                    <p>Introduzca el número:</p>
                        <label><p>Número: </p><input type="number" name="numero" required></input></label></br>
                        </br></br><input type="submit" value="Enviar" name="enviar"></button>
                    </form>
                <?php
                }
                ?>
    </section>  
</body>
</html>