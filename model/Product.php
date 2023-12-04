<?php
class Product {
    protected $stock;
    protected $x_category_id;

    public function __construct($id, $name, $description, $price, $stock, $image, $category_id) {
        parent::__construct(1,$id, $name, $description, $price, $image);
        $this->stock = $stock;
        $this->category_id = $category_id;
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
    public function pushToData($data,$value) {
        $this->{$data}[] = $value;
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
    public function __toString(){
        return $this->product_id." - ".$this->pro_name." - ".$this->pro_description." - ".$this->price." - ".$this->stock." - ".$this->image." - ".$this->x_category_id;
    }
    
}
?>