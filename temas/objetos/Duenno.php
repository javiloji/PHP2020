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

class Duenno{
    private $_nombre;

    public function __construct($nombre){
        $this->_nombre = $nombre;
    }

    public function getNombre(){
        return $this->_nombre;
    }
}

?>