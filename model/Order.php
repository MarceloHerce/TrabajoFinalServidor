<?php
class Order {
    #atributos de tablas
    protected $order_id;
    protected $x_user_id;
    protected $order_date;
    // Relación con orders
    protected $items;
    public function __construct($order_id, $x_user_id, $order_date){
        $this->order_id = $order_id;
        $this->x_user_id = $x_user_id;
        $this->order_date = $order_date;
        $this->items = [];
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

}