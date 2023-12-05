<?php
class User
{
    #atributos de tablas
    protected $user_id;
    protected $username;
    protected $password;
    protected $address;
    protected $phone;
    protected $email;
    protected $floor;
    protected $role_id;

    protected $userOrders;

    public function __construct($user_id, $username, $password, $address, $phone, $email, $floor, $role_id)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->address = $address;
        $this->phone = $phone;
        $this->email = $email;
        $this->floor = $floor;
        $this->role_id = $role_id;
        $this->userOrders = [];
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function dataPush($data, $value)
    {
        $this->{$data}[] = $value;
    }

    public function __toString()
    {
        return $this->user_id . " " . $this->username . " " . $this->password . " " . $this->address . " " . $this->phone . " " . $this->email . " " . $this->floor . " " . $this->role_id;
    }
}
?>