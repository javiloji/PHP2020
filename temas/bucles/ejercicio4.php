<?php

echo "4. Mostrar la paleta de colores.<br><br>";

echo "<table>";
for ($i=1; $i < 12; $i++) { 
    echo "<tr>";
    for ($j=1; $j < 12; $j++) { 

        for ($f=1; $f < 12; $f++) { 
    
        echo "<td style='width: 7px;height: 10px;background-color:rgb(".$i*20 . ", ".$j*20 .", ".$f*20 .");'>";
        }

    }

    echo "</tr>";
}

echo "</tr></table>";

?>