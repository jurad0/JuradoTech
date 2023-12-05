<?php
require_once("../connection/Connection.php");
require_once("../model/userImpl.php");

session_start();
if (isset($_SESSION["usuario"])) {
    if (isset($_POST["submit"])) {
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
        $mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : false;
        $pass = isset($_POST["password"]) ? trim($_POST["password"]) : false;
        $address = isset($_POST["address"]) ? trim($_POST["address"]) : false;
        $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : false;
        $floor = isset($_POST["floor"]) ? trim($_POST["floor"]) : false;
        echo $mail;

        $arrErr = array();

        if (!empty($username) && !is_numeric($username)) {
            $validatedUsername = true;
        } else {
            $validatedUsername = false;
            $arrErr["username"] = "El username no es valido";
        }

        //ANTI SQL INJECTION (TY JOAQUIN )
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name= ?");
        $stmt->execute([$username]);
        $rowCount = $stmt->rowCount();

        if ($validatedUsername && $rowCount > 0 && !($username == $_SESSION["usuario"]->username)) {
            $validatedUsername = false;
            $arrErr["username"] = "Este username ya está en uso" . $rowCount . $username;
        }

        if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $validatedMail = true;
        } else {
            $validatedMail = false;
            echo $mail;
            $arrErr["mail"] = "El mail no es valido" . $mail;
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$mail]);
        $rowCount = $stmt->rowCount();

        if ($validatedMail && $rowCount > 0 && !($mail == $_SESSION["usuario"]->email)) {
            $validatedMail = false;
            $arrErr["mail"] = "Este mail ya ha sido registrado";
        }

        if (!empty($pass)) {
            $passValidado = true;
        } else {
            $passValidado = false;
            $arrErr["password"] = "El password no es valido";
        }

        $saveUser = false;
        if (count($arrErr) === 0) {
            $saveUser = true;

            $passSegura = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);


            //Insert user on userImpl
            $userEdited = new User($_SESSION["usuario"]->user_id, $username, $passSegura, $address, $phone, $mail, $floor, $_SESSION["usuario"]->role_id);
            $userEdited = updateUser($pdo, $userEdited);
            $_SESSION["usuario"] = $userEdited;

            if ($stmt) {
                header("Location: ../controller/ProfileController.php");
            } else {
                header("Location: ../errors/Error.php");
            }
        } else {
            $_SESSION["errores"] = $arrErr;
            header("Location: ../errors/Error.php");

        }
    } else {
        include("../view/editUser.php");
    }
} else {
    header("Location: ../controller/LoginFormController.php");
}
$pdo = null;
?>