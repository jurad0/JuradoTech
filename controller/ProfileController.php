<?php
require_once("../connection/Connection.php");
require_once("../model/orderImpl.php");
session_start();

$user = $_SESSION["usuario"];
$lastPurchases = selectOrdersByUserId($pdo, $user->user_id);
require_once("../view/profile.php");
$pdo = null;
?>