
<?php

require_once('DBAbstractModel.php');

class Superheroe extends DBAbstractModel{
    
    private $id;
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setVelocidad($velocidad){
        $this->velocidad = $velocidad;
    }

    public function obtenerSuperheroe(){

        $this->query = "SELECT nombre, velocidad FROM superheroe";

        $this->get_results_from_query();

        return $this->rows;
    }

    public function obtenerSuperheroesCompletos(){
        $this->query = "SELECT id, nombre, velocidad, created_at, updated_at FROM superheroe";

        $this->get_results_from_query();

        return $this->rows;
    }

    // Otra forma de meter datos en la BD

    public function set (){ 
    
        $this->query = "INSERT INTO superheroe(nombre,velocidad) VALUES (:nombre, :velocidad)";

        // $this->parametros['id']=$user_data["id"];
        $this->parametros['nombre']=$this->nombre;
        $this->parametros['velocidad']=$this->velocidad;
            
        $this->get_results_from_query();


        $this->mensaje = "Superheroe agregado exitosamente";
    
    }


    private static $instancia;

    public static function getInstancia() {
        if (!isset(self::$instancia)) {
            $miClase = __CLASS__;
            self::$instancia = new $miClase;
        }
        return self::$instancia;
    }

    public function __clone() {
        trigger_error('La clonación no es permitida.', E_USER_ERROR);
    }

    public function getId($objeto){
        return $this->_id;
    }

    public function get($id=""){
        if($id!=""){
            $this->query = "SELECT id,nombre,velocidad,created_at,updated_at from superheroe where id=:id";
        }

        //Cargamos los parametros

        $this->parametros["id"] = $id;

        // Ejecutamos la consulta que devuelve registros
        $this->get_results_from_query();

        if(count($this->rows) == 1){
            foreach ($this->rows[0] as $propiedad => $valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = "Superheroe encontrado";
            
        }else{
            $this->mensaje = "Superheroe no encontrado";    
        }


        return $this->rows;
    }

    public function edit($user_data=array()){
        foreach ($user_data as $campo => $valor) {
            $$campo = $valor;
        }
        $this->query = "UPDATE superheroe SET nombre=:nombre, velocidad=:velocidad where id=:id";

        $this->parametros["id"]= $id;
        $this->parametros["nombre"]= $nombre;
        $this->parametros["velocidad"]= $velocidad;

        $this->get_results_from_query();
        $this->mensaje = "Superheroe editado";

    }

    public function delete ($id =""){
        $this->query= "DELETE from superheroe where id = :id";

        $this->parametros["id"]= $id;
        $this->get_results_from_query();
        $this->mensaje = "Superheroe borrado";

    }
}


?>