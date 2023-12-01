<?php
class Product {
    #atributos de tablas
    protected $service_id;
    protected $ser_name;
    protected $ser_description;
    protected $price;
    protected $image;
    public function __construct($service_id, $ser_name, $ser_description, $price, $stock, $image){
        $this->service_id = $service_id;
        $this->ser_name = $ser_name;
        $this->ser_description = $ser_description;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
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