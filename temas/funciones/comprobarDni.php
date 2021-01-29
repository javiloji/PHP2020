<?php

/**
 * 1. Escribe un script en php para calcular la letra del NIF a partir del número del DNI enviado en la URL: http://dominio.local/calculaletra?dni=30182410.
 * 
 * La letra se obtiene calculando el resto de la división del número del DNI por 23. A cada resultado le corresponde una letra.
 * 
 * 0=T; 1=R; 2=W; 3=A; 4=G; 5=M; 6=Y; 7=F; 8=P; 9=D; 10=X; 11=B; 12=N; 13=J; 14=Z; 15=S; 16=Q; 17=V; 18=H; 19=L; 20=C; 21=K; 22=E.
 * 
 * Utiliza un array para almacenar la relación letra, número.ç
 * 
 */

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
} 

function validar($dni){
    $letra = strtoupper(substr($dni, -1));
    $numeros = substr($dni,0,-1);

    if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros)==8){
        echo "El DNI $dni es correcto y válido";
    }else{
        echo "El DNI $dni es inválido";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Lopera Jiménez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular Dni</title>
</head>
<body>
    <section>
        <?php
                if(isset($_GET["enviar"])){
                    validar(filtrado($_GET["dni"]));
                }
                else{?>
                    <h1>Comprobar Dni</h1>
                    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "get">
                    <p>Introduzca el dni a comprobar:</p>
                        <label><p>Número: </p><input type="text" name="dni" required></input></label></br>
                        </br></br><input type="submit" value="Enviar" name="enviar"></button>
                    </form>
                <?php
                }
                ?>
    </section>  
</body>
</html>