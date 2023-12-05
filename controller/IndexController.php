<?php
require_once("../connection/Connection.php");
require("../model/UserImpl.php");
require("../model/productImpl.php");
require("../model/serviceImpl.php");
require("../model/employeeImpl.php");
session_start();


$services = selectAllServices($pdo);
$products = selectAllProducts($pdo);

if (isset($_GET["price"])) {
    $order = $_GET["price"];
    if ($order == "higher") {
        $products = orderByPriceDesc($products);
    } else if ($order == "lower") {
        $products = orderByPriceAsc($products);
    }
}

if (isset($_GET["category"])) {
    $categoryId = $_GET["category"];
    $categoryName = getCategoryNameByCategoryId($pdo, $categoryId);
    if ($categoryName) {
        $products = selectProductsByCategory($pdo, $categoryId);
    } else {
        echo "Category not found";
    }
}



$_SESSION["lastVisited"] = $_SERVER['REQUEST_URI'];


$pdo = null;
include_once("../index.php");


?>