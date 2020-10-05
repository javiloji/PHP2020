<?php

echo "3. Tabla de multiplicar del 1 al 10<br><br>";

echo "<table>";
for ($i=1; $i < 11; $i++) { 
    echo "<tr>";
    
    for ($j=1; $j < 11; $j++) { 
        echo "<td>".$i*$j."</td>";
    }
    
    echo "</tr>";
}

?>