<?php
abstract class Item
{
    protected $type;
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $image;

    public function __construct($type, $id, $name, $description, $price, $image)
    {
        $this->type = $type;
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
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
        return $this->type . " " . $this->id . " " . $this->name . " " . $this->description . " " . $this->price . " " . $this->image;
    }
}
?>