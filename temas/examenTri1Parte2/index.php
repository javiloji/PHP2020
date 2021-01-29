<?php

/**
 * 
 * @author Javier Lopera Jimenez
 * 
 */

session_start();

$aMultas = array(
    array(
        "id" => 1,
        "idAgente" => 1,
        "Matricula" => "ABX134",
        "Descripcion" => "Multa de tráfico",
        "Fecha" => 	"2020-12-01",
        "Importe" => 60,
        "Estado" => "Pendiente",
    ),
    array(
        "id" => 2,
        "idAgente" => 2,
        "Matricula" => "ACZ134",
        "Descripcion" => "Multa de tráfico",
        "Fecha" => 	"2020-12-07",
        "Importe" => 160,
        "Estado" => "Pendiente",
    ),
    array(
        "id" => 3,
        "idAgente" => 2,
        "Matricula" => "BXD234",
        "Descripcion" => "Multa de tráfico",
        "Fecha" => "2020-12-21",
        "Importe" => 80,
        "Estado" => "Pagada",
    ),
);

if(isset($_POST["pagarMulta"])){
    foreach ($_SESSION["multas"] as $multa) {
        foreach ($multa as $datos => $valor) {
            // echo $multa["id"];
            if($multa["id"] == $_POST["idPagar"]){
                $multa["Estado"] = "Pagado";
            }
            break;

        }
    }
}

if(!isset($_SESSION["multas"])){
    $_SESSION["multas"]= $aMultas;
}

$_SESSION["perfil"]= "invitado";

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

if(isset($_POST["submit"])){
    if($_POST["usuario"] == "agente1" && $_POST["pass"] == "agente1"){

        
        $_SESSION["perfil"] = "agente";
        $_SESSION["agente"] = 1;

        header("Location: agente.php");

    }
    if($_POST["usuario"] == "agente2" && $_POST["pass"] == "agente2"){

        
        $_SESSION["perfil"] = "agente";
        $_SESSION["agente"] = 2;

        header("Location: agente.php");

    }
    if($_POST["usuario"] == "admin" && $_POST["pass"] == "admin"){

        
        $_SESSION["perfil"] = "admin";

        header("Location: admin.php");

    }
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
            <h3 style="text-align:center;">Usted tiene iniciada una sesión como <?php echo $_SESSION["perfil"] ?></h3><br>

            <form style="text-align:center;" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
                <p><input type = "text" name = "usuario" placeholder = "Usuario" />
                </p>
    
                <p><input type = "text" name = "pass" placeholder = "Contraseña" />
                </p>
    
                <p><input type = "submit" name = "submit" value = "Iniciar Sesion" /></p>
    
            </form><br><br>
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
                    ?>

                    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "get">
                        <input type = "submit" name = "pagar" value = "Pagar"></input>
            
                    </form>
                    <?php

                    echo "</td>";
                }
                echo '</tr>';

                
            }

            ?>
        </body>
    </html>

    <?php

if(isset($_GET["pagar"])){
    ?>
    <form style="text-align:center;" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">

        <input type = "number" name = "idPagar" placeholder = "Id" />
        <input type = "text" name = "matriculaPagar" placeholder = "Matricula" />
        <input type = "number" name = "importePagar" placeholder = "Importe" />
        <p><input type = "submit" name = "pagarMulta" value = "Pagar Multa" /></p>

    </form>

            <?php
}

?>