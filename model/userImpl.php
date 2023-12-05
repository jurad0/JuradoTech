<?php
//require_once("../connection/Connection.php");
require("../model/User.php");


function selectUserById($pdo, $userId)
{
    try {
        $sql = "SELECT * FROM users WHERE user_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $res = $stmt->fetch();
        if ($res) {
            $user = new User(
                $res["user_id"],
                $res["user_name"],
                $res["user_password"],
                $res["address"],
                $res["phone"],
                $res["email"],
                $res["floor"],
                $res["x_rol_id"]
            );

            return $user;
        }
    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}


function updateUser($pdo, User $user)
{
    $sql = "UPDATE users SET user_name = ?, user_password = ?, address = ?, phone = ?, email = ?, floor = ? WHERE user_id = $user->user_id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user->username, $user->password, $user->address, $user->phone, $user->email, $user->floor]);
    return $user;
}

function insertUser($pdo, User $user)
{
    $sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([0, $user->username, $user->password, $user->address, $user->phone, $user->email, $user->floor, $user->role_id]);
    return $stmt;
}

?>