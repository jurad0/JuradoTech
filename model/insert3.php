<?php
require_once "../connection/Connection.php";
/*
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction(); // Iniciar transacción
    $employees = [
        ["Marcelo", "Programmer", "Marcelo is probably the employee of the month, the only MVP", "src/marcelo"],
        ["Maria", "Web Designer", "María has an incredible taste for designs, always impressive", "src/maria"],
        ["Pablo", "Support Technician", "Pablo is the type of guy who you would trust your life, always helping others ", "src/pablo"],
        ["Jouse", "Network Administrator", "Apart from being the net admin, he's always willing to do everything", "src/jouse"],
        ["Jurado", "Help Desk Technician", "Probably the most charismatic guy at the office, always wearing cool shirts", "src/jurado"],
        ["Curro", "Software Tester", "Curro is the type of guy who is always looking forward to hanging out with you", "src/curro"],
        ["Alberto", "Data Entry Operator", "Alberto is always remote working; people say that he has more than one marrow, what a cool guy!", "src/alberto"]
    ];

    $sql = "INSERT INTO employee (emp_name, job_title, emp_description, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($employees as $employee) {
        $stmt->bindParam(1, $employee[0]);
        $stmt->bindParam(2, $employee[1]);
        $stmt->bindParam(3, $employee[2]);

        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $employee[3];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        $stmt->bindParam(4, $imageData, PDO::PARAM_LOB);

        $stmt->execute();
        echo "Se ha insertado el servicio con imagen: " . $employee[0] . "<br>";
    }

    $pdo->commit(); // Confirmar transacción

    // Cerrar la conexión
    $pdo = null;
} catch (Exception $e) {
    $pdo->rollBack(); // Deshacer transacción en caso de error
    echo "Error al insertar en la base de datos: " . $e->getMessage();
}
?>