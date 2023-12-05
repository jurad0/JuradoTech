<?php
require_once("../connection/Connection.php");
require("../model/employeeImpl.php");

session_start();


$employees = selectAllEmployees($pdo);



$pdo = null;
include_once("../view/aboutUs.php");


?>