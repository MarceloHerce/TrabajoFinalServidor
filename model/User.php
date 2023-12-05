<?php
class User {
    #atributos de tablas
    protected $user_id;
    protected $user_name;
    protected $user_password;
    protected $address;
    protected $phone;
    protected $email;
    protected $floor;
    protected $x_rol_id;
    
    // Relación con orders
    protected $userOrders;

    public function __construct($user_id, $user_name, $user_password, $address, $phone, $email, $floor, $x_rol_id ){
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_password = $user_password;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->floor = $floor;
        $this->x_rol_id  = $x_rol_id ;
        $this->userOrders = [];
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

}
?>