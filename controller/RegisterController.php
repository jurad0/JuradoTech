<?php

if (isset($_POST["submit"])) {
    require_once("../connection/Connection.php");
    require_once("../model/userImpl.php");
    session_start();

    //Recoger los datos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
    $mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : false;
    $pass = isset($_POST["password"]) ? trim($_POST["password"]) : false;
    $address = isset($_POST["address"]) ? trim($_POST["address"]) : false;
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : false;
    $floor = isset($_POST["floor"]) ? trim($_POST["floor"]) : false;

    //var_dump($_POST);

    $arrErr = array();
    //Hacemos validadores necesarios
    if (!empty($username) && !is_numeric($username)) {
        $validatedUsername = true;
    } else {
        $validatedUsername = false;
        $arrErr["username"] = "El username no es valido";
    }



    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name= ?");
    $stmt->execute([$username]);
    $rowCount = $stmt->rowCount();

    if ($validatedUsername && $rowCount > 0) {
        $validatedUsername = false;
        $arrErr["username"] = "This username is already in use" . $rowCount . $username;
    }

    if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $validatedMail = true;
    } else {
        $validatedMail = false;
        $arrErr["mail"] = "Wrong email";
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$mail]);
    $rowCount = $stmt->rowCount();

    if ($validatedMail && ($rowCount > 0)) {
        $validatedMail = false;
        $arrErr["mail"] = "This email is already in use";
    }

    if (!empty($pass)) {
        $passValidado = true;
    } else {
        $passValidado = false;
        $arrErr["password"] = "Invalid Password";
    }

    $saveUser = false;
    if (count($arrErr) === 0) {
        $saveUser = true;

        $passSegura = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);


        echo $username . " " . $passSegura . " " . $address . " " . $phone . " " . $mail . " " . $floor;
        $userRegister = new User(0, $username, $passSegura, $address, $phone, $mail, $floor, 2);
        var_dump($userRegister);
        echo $userRegister->username;
        $registered = insertUser($pdo, $userRegister);


        if ($stmt) {
            $_SESSION["completado"] = "Register complete";
        } else {
            $_SESSION["errores"]["general"] = "Error singin up";
        }
    } else {
        $_SESSION["errores"] = $arrErr;
    }
    $pdo = null;
    header("Location: LoginFormController.php");
}
?>