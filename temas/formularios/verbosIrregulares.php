<?php

session_start();

// unset($_SESSION["arrayVerbosUsados"]);

if(!isset($_SESSION["arrayVerbosUsados"])){
    $_SESSION["arrayVerbosUsados"]= array();
}

function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

$arrayVerbos = array (
    array("ser/estar",  "be",  "was/were",  "been"),
    array("ganarle",  "beat",  "beat",  "beaten"),
    array("empezar",  "begin",  "began",  "begun"),
    array("doblar",  "bend",  "bent",  "bent"),
    array("morder",  "bite",  "bit",  "bitten"),
    array("soplar",  "blow",  "blew",  "blown"),
    array("romper",  "break",  "broke",  "broken"),
    array("llevar/traer",  "bring",  "brought",  "brought"),
    array("contruir",  "build",  "built",  "built"),
    array("comprar",  "buy",  "bought",  "bought"),
    array("coger",  "catch",  "caught",  "caught"),
    array("elegir",  "choose",  "chose",  "chosen"),
    array("venir",  "come",  "came",  "come"),
    array("costar",  "cost",  "cost",  "cost"),
    array("hacer",  "do",  "did",  "done"),
    array("dibujar",  "draw",  "drew",  "drawn"),
    array("soñar",  "dream",  "dreamed/dreamt",  "dreamed/dreamt"),
    array("conducir",  "drive",  "drove",  "driven"),
    array("beber",  "drink",  "drank",  "drunk"),
    array("comer",  "eat",  "ate",  "eaten"),
    array("caer",  "fall",  "fell",  "fallen"),
    array("sentir",  "feel",  "felt",  "felt"),
    array("luchar",  "fight",  "fought",  "fought"),
    array("encontrar",  "find",  "found",  "found"),
    array("volar",  "fly",  "flew",  "flown"),
    array("olvidar",  "forget",  "forgot",  "forgotten"),
    array("perdonar",  "forgive",  "forgave",  "forgiven"),
    array("conseguir",  "get",  "got",  "gotten"),
    array("dar",  "give",  "gave",  "fiven"),
    array("ir",  "go",  "went",  "gone"),
    array("crecer",  "grow",  "grew",  "grown"),
    array("tener",  "have",  "had",  "had"),
    array("oir",  "hear",  "heard",  "heard"),    
    array( "esconder","hide","hid",     "hidden"),
    array( "golpear","hit","hit","hit"),
    array( "sujetar","hold","held","held"),
    array( "doler / hacer daño","hurt","hurt","hurt"),
    array( "guardar","keep","kept","kept"),
    array( "saber","know","knew","known"),
    array( "aprender","learn","learned,learnt","learned,learnt"),
    array( "marcharse","leave","left","left"),
    array( "prestar","lend","lent","lent"),
    array( "permitir","let","let","let"),
    array( "perder","lose","lost","lost"),
    array( "hacer","make","made", "made"),
    array( "significar","mean","meant","meant"),
    array( "quedar","meet","met","met"),
    array( "pagar","pay","paid","paid"),
    array( "poner","put","put","put"),
    array( "leer","read","read","read"),
    array( "sonar","ring","rang","rung"),
    array( "levantar","rise","rose","risen"),
    array( "correr","run","ran","run"),
    array( "decir","say","said","said"),
    array( "ver","see","saw","seen"),
    array( "vender","sell","sold","sold"),
    array( "enviar","send","sent","sent"),
    array( "mostrar","show","showed","showed/ shown"),
    array( "enviar","send","sent","sent"),
    array( "cerrar","shut","shut","shut"),
    array( "cantar","sing","sang","sung"),
    array( "sentarse","sit","sat","sat"),
    array( "dormir","sleep","told","told"),
    array( "hablar","speak","spoke","spoken"),
    array( "gastar","spend","spent","spent"),
    array( "estar de pie","stand","stood","stood"),
    array( "nadar","swim","swam","swum"),
    array( "tomar","take","took","taken"),
    array( "enseñar","teach","taught","taught"),
    array( "contar/ decir algo a alguien","tell","told","told"),
    array( "pensar","think","thought","thought"),
    array( "lanzar, arrojar","throw","threw","thrown"),
    array( "entender","understand","understood","understood"),
    array( "despertar","wake","woke", "woken"),
    array( "llevar puesto/ ponerse","wear","wore","worn"),
    array( "ganar","win","won","won"),
    array( "escribir","write","wrote","written"),
);

$procesaFormulario = false;
$numeroVerbos = "";
$errorNumeroVerbos = "";


if(isset($_POST["enviar"])){

    $numeroVerbos = $_POST["numeroVerbos"];

    $procesaFormulario = true;

    if(empty($numeroVerbos)){
        $procesaFormulario = false;
        $errorNumeroVerbos = "Error, este campo no puede quedar vacio.";
    }
}

if(!$procesaFormulario){
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
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" style="text-align: center; margin: 50px auto;margin-bottom:50px">
            <input type = "number" name = "numeroVerbos" placeholder = "Introduce el numero de verbos"/>
            <span style="color:red;"><?php   echo $errorNumeroVerbos;?></span></p>
            <p><input type = "submit" name = "enviar" value = "Enviar" /></p>
        </form>
        <a href='logout.php' >Cerrar sesión</a>
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
        <title>Document</title>
        <link rel="stylesheet" href="css/estilosSuma.css">
    </head>
    <body>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
            <table style="text-align: center; margin: 50px auto;margin-bottom:50px">
            <?php
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Español</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Presente</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Pasado Simple</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Pasado Participio</th>";

                for ($j=0; $j < $numeroVerbos; $j++) { 
                    echo '<tr>';
                    $verboAleatorio = rand(1, count($arrayVerbos));
                    $formaAleatoria = rand(0,3);

                    array_push($_SESSION["arrayVerbosUsados"],$arrayVerbos[$verboAleatorio]);
                    
                    for ($i=0; $i < 4; $i++) {
                        
                        if($i == $formaAleatoria){
                            echo '<td style="background: green">';
                            echo "<input type = 'text' name = 'arrayVerbos[$verboAleatorio][$i]' value = '".$arrayVerbos[$verboAleatorio][$i]."' 
                            >";
                        }
                        else{
                            echo '<td style="border: solid black 1px; padding: 10px; background: #EADAD6">';
                            echo "<input type = 'text' name = 'arrayVerbos[$verboAleatorio][$i]' value = ''>";
                        }
                        echo "</td>";
                    
                    }
                    echo "</tr>";

                }
                print_r($_SESSION["arrayVerbosUsados"]);

            ?>
            </table>
            <p style="text-align: center; margin: 50px auto;margin-bottom:50px"><input type = "submit" name = "resolver" value = "Enviar" /></p>
        </form>
        <a href='logout.php' >Cerrar sesión</a>
    </body>
</html>

    <?php 
}

if(isset($_POST["resolver"])){

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
            <table style="text-align: center; margin: 50px auto;margin-bottom:50px">
            <?php
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Español</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Presente</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Pasado Simple</th>";
                echo "<th style='border: solid black 1px; padding: 10px; background: silver'>Pasado Participio</th>";

                foreach ($_SESSION["arrayVerbosUsados"] as $key => $value) {
                    echo $key;
                } 
                print_r($_SESSION["arrayVerbosUsados"]);

                // foreach ($_SESSION["arrayVerbosUsados"] as $verbo) {
                //     echo $arrayVerbos[$verboAleatorio][0];
                // }

                // for ($j=0; $j < count($arrayVerbosUsados); $j++) { 
                //     echo '<tr>';
                //     $verboAleatorio = rand(1, count($arrayVerbos));
                //     $formaAleatoria = rand(0,3);
                //     for ($i=0; $i < 4; $i++) { 
                        
                //         if($i == $formaAleatoria){
                //             echo '<td style="background: green">';
                //             echo "<input type = 'text' name = 'arrayVerbos[$verboAleatorio][$i]' value = '".$arrayVerbos[$verboAleatorio][$i]."' 
                //             >";
                //         }
                //         else{
                //             echo '<td style="border: solid black 1px; padding: 10px; background: #EADAD6">';
                //             echo "<input type = 'text' name = 'arrayVerbos[$verboAleatorio][$i]' value = ''>";
                //         }
                //         echo "</td>";
                    
                //     }
                //     echo "</tr>";

                // }

            ?>
            </table>
            <p style="text-align: center; margin: 50px auto;margin-bottom:50px"><input type = "submit" name = "resolver" value = "Enviar" /></p>
        </form>
        <a href='logout.php' >Cerrar sesión</a>
    </body>
</html>


<?php
}
?>