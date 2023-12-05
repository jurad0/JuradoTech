<?php
require_once("../connection/Connection.php");
require("../model/userImpl.php");
require_once("../view/login.php");
session_start();
try {
    if (isset($_POST["mail"]) && isset($_POST["pass"])) {
        $mail = trim($_POST["mail"]);
        $pass = trim($_POST["pass"]);
    }
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = '?'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$mail]);
        $res = $stmt->fetch();
        if ($res->execute() && $res->rowCount() === 1) {
            $usuario = $res->fetch();

            if (password_verify($pass, $usuario["password"])) {
                $_SESSION["usuario"] = selectUserById($pdo, $usuario["id"]);
                $pdo = null;
                header("Location:  IndexController.php");
            } else {
                $_SESSION["error_login"] = "Login error ";
                $pdo = null;
                header("Location: LoginFormController.php");
            }
        } else {
            $_SESSION["error_login"] = "Login errrorr";
            $pdo = null;
            header("Location: LoginFormController.php");
        }
    } else {


        $sql = "SELECT * FROM users WHERE user_name = ('$mail')";

        $res = $pdo->prepare($sql);


        if ($res->execute() && $res->rowCount() === 1) {
            $usuario = $res->fetch();
            var_dump($usuario);
            if (password_verify($pass, $usuario["user_password"])) {
                $_SESSION["usuario"] = selectUserById($pdo, $usuario["user_id"]);
                $pdo = null;
                header("Location: IndexController.php");
            } else {
                $_SESSION["error_login"] = "Login error";
                $pdo = null;
                header("Location: LoginFormController.php");
            }
        } else {
            $_SESSION["error_login"] = "Login errrorr";
            $pdo = null;
            header("Location: LoginFormController.php");
        }
    }
} catch (Exception $e) {
    header("Location: ../errors/Error.php");
}
$pdo = null;
?>