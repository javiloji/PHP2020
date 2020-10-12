<?php


$aComunidades = array(
    array("comunidad"=>"Andalucia",
        "ciudad"=>array(
            array("nombre"=>"Cordoba","casos"=>0),
            array("nombre"=>"Sevilla","casos"=>100),
            array("nombre"=>"Malaga","casos"=>50),
            array("nombre"=>"Cadiz","casos"=>30),
            array("nombre"=>"Huelva","casos"=>20),
            array("nombre"=>"Jaen","casos"=>25),
            array("nombre"=>"Almeria","casos"=>45),
            array("nombre"=>"Granada","casos"=>5))),
    array("comunidad"=>"Comunidad de Madrid","ciudad"=>array(array("nombre"=>"Madrid","casos"=>625))),
    array("comunidad"=>"Comunidad Valenciana","ciudad"=>array(array("nombre"=>"Valencia","casos"=>200),array("nombre"=>"Castellon","casos"=>100),array("nombre"=>"Alicante","casos"=>100))),
    array("comunidad"=>"Asturias","ciudad"=>array(array("nombre"=>"Oviedo","casos"=>260))),
    array("comunidad"=>"Baleares","ciudad"=>array(array("nombre"=>"Palma de Mallorca","casos"=>260),array("nombre"=>"Menorca","casos"=>260))),
    array("comunidad"=>"Canarias","ciudad"=>array(array("nombre"=>"Tenerife","casos"=>150),array("nombre"=>"Las Palmas de Gran Canaria","casos"=>280))),
    array("comunidad"=>"Cantabria","ciudad"=>array(array("nombre"=>"Santander","casos"=>450))),
    array("comunidad"=>"Castilla La Mancha","ciudad"=>array(array("nombre"=>"Albacete","casos"=>100),array("nombre"=>"Ciudad Real","casos"=>110),array("nombre"=>"Cuenca","casos"=>30),array("nombre"=>"Guadalajara","casos"=>30),array("nombre"=>"Toledo","casos"=>20))),
    array("comunidad"=>"Castilla y Leon","ciudad"=>array(array("nombre"=>"Ávila","casos"=>50),array("nombre"=>"Burgos","casos"=>100),array("nombre"=>"León","casos"=>50),array("nombre"=>"Salamanca","casos"=>30),array("nombre"=>"Segovia","casos"=>80),array("nombre"=>"Soria","casos"=>25),array("nombre"=>"Valladolid","casos"=>95),array("nombre"=>"Zamora","casos"=>85))),
    array("comunidad"=>"Cataluña","ciudad"=>array(array("nombre"=>"Barcelona","casos"=>800),array("nombre"=>"Gerona","casos"=>110),array("nombre"=>"Lérida","casos"=>30),array("nombre"=>"Tarragona","casos"=>30))),
    array("comunidad"=>"Extremadura","ciudad"=>array(array("nombre"=>"Badajoz","casos"=>260),array("nombre"=>"Cáceres","casos"=>160))),
    array("comunidad"=>"Galicia","ciudad"=>array(array("nombre"=>"La coruña","casos"=>800),array("nombre"=>"Lugo","casos"=>110),array("nombre"=>"Orense","casos"=>30),array("nombre"=>"Pontevedra","casos"=>30))),
    array("comunidad"=>"Murcia","ciudad"=>array(array("nombre"=>"Murcia","casos"=>0))),
    array("comunidad"=>"Navarra","ciudad"=>array(array("nombre"=>"Pamplona","casos"=>300))),
    array("comunidad"=>"Pais Vasco","ciudad"=>array(array("nombre"=>"Bilbao","casos"=>200),array("nombre"=>"San Sebastian","casos"=>100),array("nombre"=>"Vitoria","casos"=>100))),
    array("comunidad"=>"La Rioja","ciudad"=>array(array("nombre"=>"Logroño","casos"=>550))),
);

$color = "";

foreach ($aComunidades as $comunidad) {
    echo "<h3>".$comunidad["comunidad"]."</h3>";
    $casos = 0;
    foreach ($comunidad["ciudad"] as $indiceCiudad => $ciudad) {
        $casos += $ciudad["casos"];
    }
    foreach ($comunidad["ciudad"] as $indiceCiudad => $ciudad) {
        if($casos>=500){
            $color="red";
        }
        else{
            $color="green";
        }

        echo "<div style='color:$color;'>".($indiceCiudad+1).". ".$ciudad["nombre"]." (". $ciudad["casos"] .") </div>";

    }
    echo "<br><div>". $casos ." casos totales. </div>";

}

?>