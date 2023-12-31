<?php
require_once("../model/Article.php");
class Product extends Article{
    protected $stock;
    protected $x_category_id;

    public function __construct($id, $name, $description, $price, $stock, $image, $category_id) {
        parent::__construct(1,$id, $name, $description, $price, $image);
        $this->stock = $stock;
        $this->x_category_id = $category_id;
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    // Sort by
    public static function sortByPriceAsc($a, $b) {
        return $a->price - $b->price;
    }
    public static function sortByPriceDesc($a, $b) {
        return $b->price - $a->price;
    }
    public static function sortByNameAsc($a, $b) {
        return strcmp($a->name , $b->name);
    }
    public static function sortByNameDesc($a, $b) {
        return strcmp($b->name , $a->name);
    }
    
}
?>