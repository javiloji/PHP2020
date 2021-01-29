<?php

 namespace App\Models;

 
class Comment {

    private $_id;
    private $_user;
    private $_comment;
    private $_blog_id;
    private $_approved;
    private $_created;
    private $_updated;


    public function getUser(){
        return $this->_user;
    }

    public function setUser($user){
        $this->_user = $user;
    }

    public function getComment(){
        return $this->_comment;
    }

    public function setComment($comment){
        $this->_comment = $comment;
    }

    public function getBlog(){
        return $this->_blog_id;
    }

    public function setBlog($blog_id){
        $this->_blog_id = $blog_id;
    }

    public function getCreated(){
        return $this->_created;
    }

    public function setCreated($created){
        $this->_created = $created;
    }

    public function getUpdated(){
        return $this->_updated;
    }

    public function setUpdated($updated){
        $this->_updated = $updated;
    }

    public function getApproved(){
        return $this->_approved;
    }

    public function setApproved($approved){
        $this->_approved = $approved;
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


    public function obtenerComment(){
        $this->query = "SELECT id, blog_id, user, comment, approved, created, updated  FROM blog";

        $this->get_results_from_query();

        return $this->rows;
    }

    // Otra forma de meter datos en la BD

    public function set (){ 
    
        $this->query = "INSERT INTO comment(blog_id, user, comment) VALUES (:blog_id, :user, :comment)";

        // $this->parametros['id']=$user_data["id"];
        $this->parametros['blog_id']=$this->_blog_id;
        $this->parametros['user']=$this->_user;
        $this->parametros['comment']=$this->_comment;
        $this->parametros['created']=$this->_created;
            
        $this->get_results_from_query();


        $this->mensaje = "Comment agregado exitosamente";
    
    }


   
    // public function get($id=""){
    //     if($id!=""){
    //         $this->query = "SELECT id,nombre,velocidad,created_at,updated_at from superheroe where id=:id";
    //     }

    //     //Cargamos los parametros

    //     $this->parametros["id"] = $id;

    //     // Ejecutamos la consulta que devuelve registros
    //     $this->get_results_from_query();

    //     if(count($this->rows) == 1){
    //         foreach ($this->rows[0] as $propiedad => $valor) {
    //             $this->$propiedad = $valor;
    //         }
    //         $this->mensaje = "Superheroe encontrado";
            
    //     }else{
    //         $this->mensaje = "Superheroe no encontrado";    
    //     }


    //     return $this->rows;
    // }

    // public function edit($user_data=array()){
    //     foreach ($user_data as $campo => $valor) {
    //         $$campo = $valor;
    //     }
    //     $this->query = "UPDATE superheroe SET nombre=:nombre, velocidad=:velocidad where id=:id";

    //     $this->parametros["id"]= $id;
    //     $this->parametros["nombre"]= $nombre;
    //     $this->parametros["velocidad"]= $velocidad;

    //     $this->get_results_from_query();
    //     $this->mensaje = "Superheroe editado";

    // }

    // public function delete ($id =""){
    //     $this->query= "DELETE from superheroe where id = :id";

    //     $this->parametros["id"]= $id;
    //     $this->get_results_from_query();
    //     $this->mensaje = "Superheroe borrado";

    // }

}