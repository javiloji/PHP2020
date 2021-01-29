<?php

/**
 * 
 * @author Javier Lopera Jimenez
 * 
 */

session_start();

if($_SESSION["perfil"] != "admin"){
    header("Location: index.php");
}


?>



<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Multas</title>
        </head>
        <body>
            <h1 style="text-align:center;">Gestión de Multas</h1>
            <h3 style="text-align:center;">Bienvenido administrador</h3><br>

            <?php
            echo '<table style="margin:0 auto;">';

            foreach ($_SESSION["multas"][0] as $datos => $valor) {
                echo '<th style="border: solid black 1px; padding: 10px;">';
                echo $datos;
                echo '</th>';
            }
            
            foreach ($_SESSION["multas"] as $multa) {
                echo '<tr style="border: solid black 1px; padding: 10px; background: silver">';

                foreach ($multa as $datos => $valor) {
                    echo '<td style="border: solid black 1px; padding: 10px;">';
                    echo $valor;
                    echo "</td>";
                }
                if($valor == "Pendiente"){
                    echo '<td style="border: solid black 1px; padding: 10px;">';
                    echo "Pagar";
                    echo "</td>";
                }
                echo '</tr>';

            }
            echo "</table>";

            ?>
            <br><br>

            <p style="text-align:center;">Resumen de administrador</p>
            <br><br>
            <p style="text-align:center;"><button style="padding: 6px;"><a  href='salir.php' >Cerrar sesión</a></button></p>

        </body>
    </html>