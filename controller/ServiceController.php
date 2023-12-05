<?php
require_once("../connection/Connection.php");
require_once("../controller/CartViewController.php");


session_start();


$services = selectAllServices($pdo);

if (isset($_GET["price"])) {
    $order = $_GET["price"];
    if ($order == "higher") {
        $services = orderByPriceDesc($services);
    } else if ($order == "lower") {
        $services = orderByPriceAsc($services);
    }
}
if (isset($_GET["name"])) {
    $order = $_GET["name"];
    if ($order == "az") {
        $services = orderByNameAsc($services);
    } else if ($order == "za") {
        $services = orderByNameDesc($services);
    }
}




$_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];

//AdminCRUD
$admin = false;
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]->role_id == 1) {
        $admin = true;
    }
}

$pdo = null;

include_once("../view/services.php");



?>