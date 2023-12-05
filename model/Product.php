<?php
require_once("../model/Item.php");
class Product extends Item
{

    protected $category_id;
    protected $stock;


    public function __construct($id, $name, $description, $price, $stock, $image, $category_id)
    {

        parent::__construct(1, $id, $name, $description, $price, $image);
        $this->stock = $stock;
        $this->category_id = $category_id;
    }
    public function __get($atributo)
    {
        return $this->$atributo;
    }
    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __toString()
    {
        return parent::__toString() . " " . $this->stock . " " . $this->category_id;
    }

    public function dataPush($data, $value)
    {
        $this->{$data}[] = $value;
    }

    public static function compareByPriceAsc($a, $b)
    {
        return $a->price - $b->price;
    }
    public static function compareByPriceDesc($a, $b)
    {
        return $b->price - $a->price;
    }
    public static function compareByNameAsc($a, $b)
    {
        return strcmp($a->name, $b->name);
    }
    public static function compareByNameDesc($a, $b)
    {
        return strcmp($b->name, $a->name);
    }



}
?>