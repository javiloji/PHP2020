<?php

 namespace App\Models;


class Blog {

    private $_id;
    private $_title;
    private $_blog;
    private $_image;
    private $_author;
    private $_tags;
    private $_created;
    private $_updated;

    public $comments = array();

    // public function __construct($titulo, $blog, $image, $author , $tags){
    //     $this->_titulo = $titulo;
    //     $this->_blog = $blog;
    //     $this->_image = $image;
    //     $this->_author = $author;
    //     $this->_tags = $tags;
    // }

    public function __construct(){
        // $this->setCreated(new \Datetime());
        // $this->setUpdated(new \Datetime());
    }

    public function getTitle(){
        return $this->_title;
    }

    public function setTitle($title){
        $this->_title = $title;
    }

    public function getBlog(){
        return $this->_blog;
    }

    public function setBlog($blog){
        $this->_blog = $blog;
    }

    public function getImage(){
        return $this->_image;
    }

    public function setImage($image){
        $this->_image = $image;
    }

    public function getAuthor(){
        return $this->_author;
    }

    public function setAuthor($author){
        $this->_author = $author;
    }

    public function getTags(){
        return $this->_tags;
    }

    public function setTags($tags){
        $this->_tags = $tags;
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

    public function addComment($comment){
        array_push($this->comments, $comment);
    }

    public function numComments(){
        return sizeof($this->comments);
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


    public function obtenerBlog(){
        $this->query = "SELECT id, title, author, blog, image, tags, created, updated  FROM blog";

        $this->get_results_from_query();

        return $this->rows;
    }

    // Otra forma de meter datos en la BD

    public function set (){ 
    
        $this->query = "INSERT INTO blog(title, author, blog, image, tags) VALUES (:title, :author, :blog, :image, :tags)";

        // $this->parametros['id']=$user_data["id"];
        $this->parametros['title']=$this->_title;
        $this->parametros['author']=$this->_author;
        $this->parametros['blog']=$this->_blog;
        $this->parametros['image']=$this->_image;
        $this->parametros['tags']=$this->_tags;
        $this->parametros['created']=$this->_created;
        $this->parametros['updated']=$this->_updated;
            
        $this->get_results_from_query();


        $this->mensaje = "Blog agregado exitosamente";
    
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