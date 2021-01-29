<?php

session_start();

define("NF", 8);
define("NC", 8);
define("NM", 10);


if (!isset($_SESSION['tablero'])) {
    $_SESSION['tablero'] = array();
    $_SESSION['visible'] = array();
    generarTablero();
}

function generarTablero()
{
    for ($i = 0; $i < NF; $i++) {
        for ($j = 0; $j < NC; $j++) {
            $_SESSION['tablero'][$i][$j] = 0;
            $_SESSION['visible'][$i][$j] = 0;
        }
    }

    $minasColocadas = 0;
    while ($minasColocadas < NM) {
        do {
            $x = rand(0, NF - 1);
            $y = rand(0, NC - 1);
        } while ($_SESSION['tablero'][$x][$y] == -1);

        $_SESSION['tablero'][$x][$y] = -1;
        $minasColocadas++;

        for ($i = max($x - 1, 0); $i <= min($x + 1, NF - 1); $i++) {
            for ($j = max($y - 1, 0); $j <= min($y + 1, NC - 1); $j++) {
                if ($_SESSION['tablero'][$i][$j] != -1) {
                    $_SESSION['tablero'][$i][$j]++;
                }
            }
        }
    }
}



function dibujaTablero()
{

    echo "<table border=\"1\">";
    for ($i = 0; $i < NF; $i++) {
        echo "<tr>";
        for ($j = 0; $j < NC; $j++) {
            echo "<td width=\"50px\" style=\"text-align:center;\">" . $_SESSION['tablero'][$i][$j] . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function mostrarVisible()
{
    echo "<table border=\"1\">";

    for ($i = 0; $i < NF; $i++) {
        echo "<tr>";
        for ($j = 0; $j < NC; $j++) {
            echo "<td width=\"50px\" style=\"text-align:center;\">";
            if($_SESSION['visible'][$i][$j] == 1){
                if($_SESSION['tablero'][$i][$j] == 0){
                    echo "*";
                }else{
                    echo $_SESSION['tablero'][$i][$j];
                }
            }else{
                echo "<a href=\"buscaminasAriza.php?fila=$i&columna=$j\">";
                echo $_SESSION['visible'][$i][$j];
                echo "</a>";
             }
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function clicCasilla($f, $c)
{
    if ($_SESSION["visible"][$f][$c] == 0) {
        $_SESSION["visible"][$f][$c] = 1;
        if ($_SESSION["tablero"][$f][$c] == -1) {
            echo "Explosion => Muerto";
        } else {
            if ($_SESSION["tablero"][$f][$c] == 0) {
                for ($x = max($f - 1, 0); $x <= min($f + 1, NF - 1); $x++) {
                    for ($y = max($c - 1, 0); $y <= min($c + 1, NC - 1); $y++) {
                        clicCasilla($x, $y);
                    }
                }
            }
        }
    }
}

if (isset($_GET['fila'])) {
    clicCasilla($_GET['fila'], $_GET['columna']);
}

dibujaTablero();
echo "<br>";
mostrarVisible();



?>

<p><a href="cerrarSesion.php">Cerrar SesiÃ³n</a></p>
