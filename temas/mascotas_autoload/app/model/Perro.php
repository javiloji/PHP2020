<?php
namespace App\Model;

/**
 * 1. Confeccionar una clase Empleado, definir como atributos su nombre y sueldo. 
 * Definir un método inicializar que lleguen como dato el nombre y sueldo. 
 * Plantear un segundo método que imprima el nombre y un mensaje si 
 * debe o no pagar impuestos (si el sueldo supera a 3000 paga impuestos.
 */

class Perro{
    private $_duenno;
    private $_adiestrador;
    private $_nombre;
    private $_raza;
    private $_peso;
    private $_inteligencia;
    // private $_muerto;

    public function __construct($duenno, $adiestrador, $nombre, $raza){
        $this->_duenno = $duenno;
        $this->_adiestrador = $adiestrador;
        $this->_nombre = $nombre;
        $this->_raza = $raza;
        $this->_peso = 1;
        $this->_inteligencia = 0;

        echo "El Perro " . $this->_nombre . " a sido adoptado por " . $duenno->getNombre() . ", tiene 
        un peso de " . $this->_peso . " y una inteligencia de " . $this->_inteligencia;
        // $this->_muerto = false;
    }
    
    public function getDuenno(){
        return $this->_duenno;
    }

    public function getAdiestrador(){
        return $this->_adiestrador;
    }

    public function getNombre(){
        return $this->_nombre;
    }

    public function getRaza(){
        return $this->_raza;
    }

    public function getPeso(){
        return $this->_peso;
    }

    public function setPeso($aumento){
        $this->_peso += $aumento;
    }

    public function getInteligencia(){
        return $this->_inteligencia;
    }

    public function setInteligencia($aumento){
        $this->_inteligencia += $aumento;
    }

    public function getSalud(){
        return $this->_salud;
    }

    public function darPatita(){
        if($this->_inteligencia >= 20){
            echo "<br> ".$this->_nombre . " te da la patita. ";
        }
        else{
            echo "<br> ".$this->_nombre . " no sabe dar la patita. ";
        }
    }

    public function comer(){

        if($this->getPeso() >= 1.8){
            echo "El perro no puede comer mas, va a reventar.";
            return;
        }

        $this->setPeso(0.2);

        echo $this->getNombre() . " esta contento por comer, ha engordado 200 gramos. Ahora pesa ". $this->getPeso() . " kg.<br>";
    }
}

?>