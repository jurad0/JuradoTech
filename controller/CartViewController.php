<?php
require_once("../connection/Connection.php");
require_once("../model/orderImpl.php");
require_once("../model/orderImpl.php");
//SET Items Carrito from Cookies
if (isset($_COOKIE['aimaiLaCookie'])) {
    $empty = "";
    // Decode and unserialize the data
    $decodedData = unserialize(base64_decode($_COOKIE['aimaiLaCookie']));
    $items = [];
    foreach ($decodedData as $item) {
        if ($item["type"] == 1) {
            $prod = selectProductById($pdo, $item["id"]);
            $item = [
                "item" => $prod,
                "quantity" => $item["quantity"]
            ];
            array_push($items, $item);
        } else {
            $serv = selectServiceById($pdo, $item["id"]);
            $item = [
                "item" => $serv,
                "quantity" => $item["quantity"]
            ];
            array_push($items, $item);
        }
    }
    // Use the data as needed
} else {
    $empty = "Your cart is empty :(";
}
?>