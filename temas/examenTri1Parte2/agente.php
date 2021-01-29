<?php

/**
 * 
 * @author Javier Lopera Jimenez
 * 
 */

session_start();

if($_SESSION["perfil"] != "agente"){
    header("Location: index.php");
}

if(isset($_POST["crear"])){

    array_push($_SESSION["multas"], 
    array(
        count($_SESSION["multas"])+1,
        $_SESSION["agente"],
        $_POST["matricula"],
        $_POST["descripcion"],
        $_POST["fecha"],
        $_POST["importe"],
        "Pendiente",
    ));

}

if(isset($_POST["crearMulta"])){

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
            <h3 style="text-align:center;">Usted tiene iniciada una sesión como <?php echo $_SESSION["perfil"] ?></h3><br>

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

            <form style="text-align:center;" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">

                <input type = "text" name = "matricula" placeholder = "Matricula" />
                <input type = "text" name = "descripcion" placeholder = "Descripcion" />
                <input type = "date" name = "fecha" placeholder = "Fecha" />
                <input type = "number" name = "importe" placeholder = "Importe" />
                <p><input type = "submit" name = "crear" value = "Crear Multa" /></p>
    
            </form>

            <br><br>
            <p style="text-align:center;"><button style="padding: 6px;"><a  href='salir.php' >Cerrar sesión</a></button></p>

        </body>
    </html>
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
            <title>Multas</title>
        </head>
        <body>
            <h1 style="text-align:center;">Gestión de Multas</h1>
            <h3 style="text-align:center;">Bienvenido Agente</h3><br>

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

            <form style="text-align:center;" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
    
                <p><input type = "submit" name = "crearMulta" value = "Crear Multa" /></p>
    
            </form>

            <br><br>
            <p style="text-align:center;"><button style="padding: 6px;"><a  href='salir.php' >Cerrar sesión</a></button></p>

        </body>
    </html>

    <?php

        }


?>