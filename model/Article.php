<?php
abstract class Article {
    protected $type;
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    public function __construct($type, $id, $name, $description, $price, $image){
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
    }

   
    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

}
?>