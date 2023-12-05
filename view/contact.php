<?php
include_once("../connection/Connection.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="/view/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>JuradoTech</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
    <div class="container px-3">
        <!-- Brand -->
        <a class="navbar-brand fs-2" href="#">JuradoTech</a>

        <!-- Navbar toggler button for small screens -->
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto pe-3">
                <li class="nav-item">
                    <a class="nav-link" href="../controller/IndexController.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/ServiceController.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/AboutUsController.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../controller/ProfileController.php">Profile</a>
                </li>
            </ul>

            <!-- Cart icon opening a modal -->
            <button class="btn btn-outline-dark" type="button">
                <a href="../view/cart.php">Cart</a>
            </button>

            <?php if (isset($_SESSION['usuario'])): ?>
                <a class="btn btn-outline-dark" href="../model/logout.php">Logout</a>
            <?php else: ?>
                <a class="btn btn-outline-dark" href="../view/login.php">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<body>



    <!-- Formulario con estilos Bootstrap -->
    <div class="card-body">
        <form action="../model/mailSender.php" method="post" class="container mt-5">
            <div class="form-group">
                <label for="nombre">Name:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Message:</label>
                <textarea id="mensaje" name="mensaje" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>

    </div>

</body>

</html>