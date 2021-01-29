<?php

    /**
     * Función para factorizar un número
     * @param numero Introducido por un formulario
     */

    function factorizarNumeros($numero){
        for($i=2;$i<=$numero;$i++){
            while($numero % $i==0){
                echo ($numero." | ".$i."<br>");
                $numero/=$i;
            }
        }
    }
    

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Javier Lopera Jiménez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorizar</title>
</head>
<body>
    <section>
        <?php
                if(isset( $_GET["numero"])){
                    echo "La factorización del número ".$_GET["numero"]." es:</br></br>";
                    factorizarNumeros($_GET["numero"]);
                }
                else{?>
                    <h1>Factorizar un número</h1>
                    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "get">
                    <p>Introduzca el número a factorizar.</p>
                        <label><p>Número: </p><input type="number" name="numero" value= "required"></input></label></br>
                        </br></br><input type="submit" value="Enviar" name=""></button>
                    </form>
                <?php
                }
                ?>
    </section>  
</body>
</html>