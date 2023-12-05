<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Error Page</title>
    <link rel="stylesheet" href="..\view\css\errorst.css">
</head>

<body>


    <div class="error-container">
        <h1 class="error-message">¡Error!</h1>
        <p class="error-details">
            Error appeared during execution
        </p>
        <p class="error-details">
            <strong class="error-code">Error:</strong>
            <?php echo $error->getCode(); ?>
        </p>
        <p class="error-details">
            <strong class="error-file">Archive:</strong>
            <?php echo $error->getFile(); ?>
        </p>
        <p class="error-details">
            <strong class="error-line">Line:</strong>
            <?php echo $error->getLine(); ?>
        </p>
        <p class="error-details">
            Please, Try again later
        </p>
    </div>
</body>

</html>