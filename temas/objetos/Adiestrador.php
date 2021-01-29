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

class Adiestrador{
    private $_nombre;
    private $_nivel;

    public function __construct($nombre, $nivel){
        $this->_nombre = $nombre;
        $this->_nivel = $nivel;
    }

    public function adiestrar($perro){

        if($perro->getInteligencia() > 100){
            echo "<br>El perro es demasiado inteligente, no le entra mas informacion en el cerebro.<br>";
            return;
        }

        if($this->_nivel == 1){
            if($perro->getInteligencia() +3 > 100){
                echo "<br>El perro es demasiado inteligente, no le entra mas informacion en el cerebro.<br>";
                return;
            }
            echo "<br>El adiestrador ". $this->_nombre ." esta enseñando a ". $perro->getNombre() ."<br>";
            echo $perro->getNombre() ." ha adquirido +3 de inteligencia <br>";
            $perro->setInteligencia(3);
        }
        if($this->_nivel == 2){
            if($perro->getInteligencia() +4 > 100){
                echo "<br>El perro es demasiado inteligente, no le entra mas informacion en el cerebro.<br>";
                return;
            }
            echo "<br>El adiestrador ". $this->_nombre ." esta enseñando a ". $perro->getNombre() ."<br>";
            echo $perro->getNombre() ." ha adquirido +4 de inteligencia <br>";
            $perro->setInteligencia(4);
        }
        if($this->_nivel == 3){
            if($perro->getInteligencia() +5 > 100){
                echo "<br>El perro es demasiado inteligente, no le entra mas informacion en el cerebro.<br>";
                return;
            }
            echo "<br>El adiestrador ". $this->_nombre ." esta enseñando a ". $perro->getNombre() ."<br>";
            echo $perro->getNombre() ." ha adquirido +5 de inteligencia <br>";
            $perro->setInteligencia(5);
        }
    }

    

}

?>