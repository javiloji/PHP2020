<?php

/**
 * 1. Confeccionar una clase Empleado, definir como atributos su nombre y sueldo. 
 * Definir un método inicializar que lleguen como dato el nombre y sueldo. 
 * Plantear un segundo método que imprima el nombre y un mensaje si 
 * debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos.
 */

class Empleado{
    private $_nombre;
    private $_sueldo;

    public function __construct($nombre, $sueldo){
        $this->_nombre = $nombre;
        $this->_sueldo = $sueldo;
    }

    public function pagar(){
        if($this->_sueldo >3000){
            echo "<br>El empleado ". $this->_nombre . " cobra " . $this->_sueldo . " € y debe pagar impuestos.<br>";
        }
        else{
            echo "El empleado ". $this->_nombre . " cobra " . $this->_sueldo . " € y no debe pagar impuestos.";
        }
    }
}

?>