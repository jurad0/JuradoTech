<?php
/*

require_once "../connection/Connection.php";

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->beginTransaction(); // Iniciar transacción
    $services = [
        ["Website design", "Sample Category", "350", "src/webDesign"],
        ["Website development", "Sample Category", "1550", "src/development"],
        ["Website maintenance", "Service", "150", "src/maintenance"],
        ["Enhance your computer's performance", "Service", "80", "src/performance"],
        ["Install drivers and programs", "Service", "15", "src/install"],
        ["Online error solution. Troubleshooting", "Service", "10", "src/troubleshooting"],
        ["PC repair", "Service", "45", "src/repair"]
    ];

    $sql = "INSERT INTO services (ser_name, ser_description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    foreach ($services as $service) {
        $stmt->bindParam(1, $service[0]);
        $stmt->bindParam(2, $service[1]);
        $stmt->bindParam(3, $service[2]);

        $extensions = ['.png', '.jpg', '.jpeg'];
        $imagePath = $service[3];

        foreach ($extensions as $extension) {
            if (file_exists($imagePath . $extension)) {
                $imagePath .= $extension;
                break;
            }
        }
        $imageData = file_get_contents($imagePath);

        // Concatenate the file extension based on the file type
        $imagePath = $service[3] . '.jpg';  // Assuming the images are in JPG format

        $imageData = file_get_contents($imagePath);

        $stmt->bindParam(4, $imageData, PDO::PARAM_LOB);

        $stmt->execute();
        echo "Se ha insertado el servicio con imagen: " . $service[0] . "<br>";
    }

    $pdo->commit(); // Confirmar transacci贸n

    // Cerrar la conexi贸n
    $pdo = null;
} catch (Exception $e) {
    $pdo->rollBack(); // Deshacer transacci贸n en caso de error
    echo "Error al insertar en la base de datos: " . $e->getMessage();
}
?>