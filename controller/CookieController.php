<?php
session_start();
require_once("../connection/Connection.php");
require("../model/productImpl.php");
require("../model/serviceImpl.php");

if (!isset($_COOKIE["aimaiLaCookie"]) && isset($_GET["type"]) && isset($_GET["id"])) {
    //SETTING THE COOKIE
    $cookie_name = "aimaiLaCookie";
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];
    $array = [];
    $assocArray = [
        "type" => $itemType,
        "id" => $itemId,
        "quantity" => 1
    ];
    array_push($array, $assocArray);
    $cookie_value = base64_encode(serialize($array));
    setcookie($cookie_name, $cookie_value, time() + (86400 * 2), "/");
    header("Location: ../view/cart.php");

} else if (isset($_GET["type"]) && isset($_GET["id"])) {
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];

    $items = unserialize(base64_decode($_COOKIE["aimaiLaCookie"]));
    function searchArrayValues(&$items, $value1, $value2)
    {
        $cont = 0;
        foreach ($items as $item) {


            if ($item["type"] === $value1 && $item["id"] === $value2) {

                $item["quantity"] = $item["quantity"] + 1;

                $items[$cont] = $item;
                $cookieItems = base64_encode(serialize($items));
                setcookie("aimaiLaCookie", $cookieItems, time() + (86400 * 2), "/");
                header("Location: ../view/cart.php");
                return true;
            }
            $cont++;
        }
        return false;
    }
    //IF ITEM EXIST THEN WE PUSH IT INTO THE ARRAY
    $itemExists = searchArrayValues($items, $itemType, $itemId);
    if (!$itemExists) {


        $assocArray = [
            "type" => $itemType,
            "id" => $itemId,
            "quantity" => 1
        ];

        array_push($items, $assocArray);
        $cookieItems = base64_encode(serialize($items));
        setcookie("aimaiLaCookie", $cookieItems, time() + (86400 * 2), "/");
        header("Location: ../view/cart.php");
    }

}


//header("Location: ".$_SESSION["lastVisited"]);
header("Location: ../view/cart.php");

?>