<?php
require_once("../model/Service.php");
require_once dirname(__DIR__) . "\model\Service.php";

function selectAllServices($pdo)
{
    try {

        $statement = $pdo->query("SELECT * FROM services");

        $results = [];
        foreach ($statement->fetchAll() as $serv) {
            $image = $serv["image"];
            $base64Image = base64_encode($image);
            $objectS = new Service($serv["service_id"], $serv["ser_name"], $serv["ser_description"], $serv["price"], $base64Image);

            array_push($results, $objectS);
        }
        return $results;
    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
        echo $e;
    }
}
function selectServiceById($pdo, $id)
{
    try {
        $sql = "SELECT * FROM services WHERE service_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        if ($res) {
            $image = $res["image"];
            $base64Image = base64_encode($image);
            $service = new Service(
                $res["service_id"],
                $res["ser_name"],
                $res["ser_description"],
                $res["price"],
                $base64Image
            );
            return $service;
        }
    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

?>