<?php
require_once dirname(__DIR__) . "\model\Employee.php";

function selectAllEmployees($pdo)
{
    try {
        //Hacemos la query
        $statement = $pdo->query("SELECT * FROM employee");

        $results = [];
        foreach ($statement->fetchAll() as $emp) {
            $image = $emp["image"];
            $base64Image = base64_encode($image);
            $objectE = new Employee($emp["employee_id"], $emp["emp_name"], $emp["job_title"], $emp["emp_description"], $base64Image);

            array_push($results, $objectE);
        }
        return $results;
    } catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
        echo $e;
    }
}


?>