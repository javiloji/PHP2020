<?php

// 5. Información sobre continentes, países, capitales y banderas.

$continentes = array(
    "Europa" => array(
        array("nombre"=>"España","capital"=>"Madrid","bandera"=>"espana.png"),
        array("nombre"=>"Italia","capital"=>"Sicilia","bandera"=>"italia.png"),
        array("nombre"=>"Alemania","capital"=>"Berlin","bandera"=>"alemania.png"),
        array("nombre"=>"Francia","capital"=>"Paris","bandera"=>"francia.png"),
        array("nombre"=>"Portugal","capital"=>"Lisboa","bandera"=>"portugal.png")),
    "Asia" => array(        
        array("nombre"=>"China","capital"=>"Pekin","bandera"=>"china.png"),
        array("nombre"=>"Japón","capital"=>"Tokio","bandera"=>"japon.png"),
        array("nombre"=>"Tailandia","capital"=>"Bangkok","bandera"=>"tailandia.png"),
        array("nombre"=>"Mongolia","capital"=>"Ulán Bator","bandera"=>"mongolia.png")),
);




foreach ($continentes as $continente => $paises) {
    echo "<h2>$continente</h2>";
    echo "<table style= 'border:1px solid black;border-collapse: collapse;'>";
    echo "<tr>
    <th style= 'border:1px solid black;padding: 4px;'>Pais</th>
    <th style= 'border:1px solid black;padding: 4px;'>Capital</th>
    <th style= 'border:1px solid black;padding: 4px;'>Bandera</th>
    </tr>";
    echo "<tr >";
    foreach ($paises as $celda) {
            echo "<td style= 'border:1px solid black;padding: 4px;'>".$celda["nombre"]."</td>";
            echo "<td style= 'border:1px solid black;padding: 4px;'>".$celda["capital"]."</td>";
            echo "<td style= 'border:1px solid black;padding: 4px;'><img src='img/".$celda["bandera"]."' alt='Girl in a jacket' width='60' height='40'></td>";    
            echo "</tr>";
    }    
    echo "</table>";
}
