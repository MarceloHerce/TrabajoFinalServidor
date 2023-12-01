<?php
class Product {
    #atributos de tablas
    protected $product_id;
    protected $pro_name;
    protected $pro_description;
    protected $price;
    protected $stock;
    protected $image;
    protected $x_category_id;
    public function __construct($product_id, $pro_name, $pro_description, $price, $stock, $image, $x_category_id){
        $this->product_id = $product_id;
        $this->pro_name = $pro_name;
        $this->pro_description = $pro_description;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
        $this->x_category_id = $x_category_id;
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


}