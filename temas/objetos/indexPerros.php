<?php

/**
 * 1.    Completamos el modelo.
 * 
 * Los perros pertenecen a una persona y disponen de un chip cuya lectura nos permite 
 * conocer raza y edad del perro, así como el nombre y teléfono del dueño.
 * 
 * El estado de ánimo de la mascota influye en su comportamiento y la raza en el carácter e inteligencia.
 * 
 * Las personas mediante cursos de formación pueden convertirse en instructores con una 
 * determinad cualificación que determinará la velocidad de aprendizaje de los perros 
 * que adiestran. Es necesario conocer el nivel de formación de los instructores 
 * para poder elegir el más adecuado para nuestra mascota.
 * 
 * Añadir todos aquellos supuestos que permitan enriquecer el modelo: razas de perros, 
 * nivel de salud, estado de ánimo, veterinarios, etc.
 */

include "Duenno.php";
include "Perro.php";
include "Adiestrador.php";

$pepe = new Duenno("Pepe");

$luis = new Adiestrador("Luis",2);

$antonio = new Adiestrador("Antonio",2);

$tobi = new Perro($pepe,$luis, "Tobi", "Labrador");

$tobi->darPatita();


$antonio->adiestrar($tobi);

$luis->adiestrar($tobi);
$luis->adiestrar($tobi);
$luis->adiestrar($tobi);

echo $tobi->getInteligencia() . "<br>";


$tobi->comer();
$tobi->comer();
$tobi->comer();
$tobi->comer();
$tobi->comer();
$tobi->comer();
$tobi->comer();
$tobi->comer();



$tobi->darPatita();
?>