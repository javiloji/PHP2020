<?php

// $numeros[][];

$numeros = array();

$tablas = [];

$tablasElegidas = [];

$procesarFormulario = false;
$aciertos = 0;

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}  

// if(!isset($_SESSION["tablas"])){
//     $_SESSION["tablas"]= [];
// }

if(isset($_POST['submit'])){
    $procesarFormulario = true;
}

if(!isset($_POST['elegirNumeroTablas'])){
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="text-align: center">
            <table style="text-align: center; margin: 100px auto;margin-bottom:50px">
                <?php
                    echo "<p style='text-align: center'>¿Cuántas tablas desea aprender?</p>";
                    echo "<input type='number' name='numeroTablas'  placeholder='4'>";
                    echo "<p style='text-align: center'><input type='submit' name='elegirNumeroTablas' value='Elegir' /></p>";
                ?>
            </table>
        </form>

<?php
}
else{
    if($_POST['numeroTablas']<= 0){
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="text-align: center">
                    <table style="text-align: center; margin: 100px auto;margin-bottom:50px">
                        <?php
                        echo $_POST['numeroTablas'];
                            echo "<p style='text-align: center'>¿Cuántas tablas desea aprender?</p>";
                            echo "<input type='number' name='numeroTablas'  placeholder='4'>";
                            echo "<p style='text-align: center'><input type='submit' name='elegirNumeroTablas' value='Elegir' /></p>";
                        ?>
                    </table>
                </form>

        <?php
        }
        else{
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="text-align: center">
                <table style="text-align: center; margin: 100px auto;margin-bottom:50px">
                    <?php
                        echo "<br><br>";

                        for ($i=0; $i < $_POST['numeroTablas']; $i++) { 
                            echo "<p>Elija una tabla : </p><input type='number' name='tablas[$i]'  placeholder='4'><br>";
                            
                        }
                        echo "<p style='text-align: center'><input type='submit' name='elegirTablas' value='Elegir' /></p>";
                    ?>
                </table>
            </form>
    
    <?php
    }
    }
    if(isset($_POST['elegirTablas'])){


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
            <table style="text-align: center; margin: 50px auto;margin-bottom:50px">
                <?php
                $aleatorio = 0;
                echo '<tr style="border: solid black 1px; padding: 10px; background: silver">';
                for($i=1;$i<12;$i++){
                    if($i == 1){
                        echo "<th></th>";
                    }
                    else{
                        echo "<th>Tabla del ";
                        echo ($i-1);
                        echo "</th>";
                    }
                }
                echo '</tr>';

                foreach ($_POST["tablas"] as $indice => $tabla) {
                    
                    echo "<tr><th style='border: solid black 1px; padding: 10px; background: silver'>Tabla del $tabla</th>";
                    

                    for ($i=1; $i < 11; $i++) { 
                        $aleatorio = rand(0,1);
                        if($aleatorio == 0){
                            echo '<td style="border: solid black 1px; padding: 10px; background: #EADAD6">';
                            echo "<input type='number' name='respuestas[$tabla][$i]' style='width:70px' placeholder='".($i)."X$tabla'></td>";
                        }
                        else{
                        echo '<td style="border: solid black 1px; padding: 10px; background: green">';
                        echo "<input type='number' name='respuestas[$tabla][$i]' style='width:70px' value='".($i*$tabla)."' readonly='readonly'></td>";

                        }
                    }
                }

                echo "</table>";
                echo "<p style='text-align: center'><input type='submit' name='submit' value='Enviar Respuesta' /></p>";

                ?>
            </table>
        </form>

        <?php
            }
            if($procesarFormulario){

        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table style="text-align: center; margin: 100px auto;margin-bottom:50px">

        <?php
        
            echo '<tr style="border: solid black 1px; padding: 10px; background: silver">';


            for($i=1;$i<12;$i++){
                if($i == 1){
                    echo "<th></th>";
                }
                else{
                    echo "<th>Tabla del ";
                    echo ($i-1);
                    echo "</th>";
                }
            }

            echo '</tr>';


                foreach ($_POST["respuestas"] as $indice => $tablaValidar) {
                    
                    
                    echo "<tr><th style='border: solid black 1px; padding: 10px; background: silver'>Tabla del $indice</th>";

                    foreach ($tablaValidar as $key => $value) {
                        
                        $aleatorio = rand(0,1);

                        if($key*$indice == $value){
                                echo '<td style="border: solid black 1px; padding: 10px; background: green">';
                                echo "<input type='number' name='respuestas[$indice][$key]' style='width:70px;' value='".($indice*$key)."' readonly='readonly'></td>";
                                $aciertos++;
                        }
                        else{
                                echo '<td style="border: solid black 1px; padding: 10px; background: red">';
                                echo "<input type='number' name='respuestas[$indice][$key]' style='width:70px;'  placeholder='".($indice)."*$key'></td>";
                                }
                                
                        }
                    echo "</tr>";
                        
                }

            echo "</table>";
            echo "<p style='text-align: center'><input type='submit' name='submit' value='Enviar Respuesta' /></p>";


            echo "<br><br> Tienes $aciertos aciertos.";
        }

        ?>
    </body>
</html>

<?php
            echo "<br><br><a target='_blank' href='https://github.com/javiloji/EntornoServidor/blob/master/formularios/tablaMultiplicar.php'>Enlace GitHub</a>"

?>