<?php

if (!isset($user)) {
    header("Location: ../controller/LoginFormController.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My css -->
    <link href="../view/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script>
    <title>Edit Profile</title>
</head>

<body>
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
    <div id="update" class="container">
        <h3 class="card-title">Edit User</h3>
        <form id="updateForm" class="mb-5 mx-auto" action="../controller/EditUserController.php" method="post">
            <fieldset class="form-row reset p-4 align-items-center border border-0 border-round rounded"
                id="register-card">

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="username" class="col-md-2 col-form-label">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" id="username" class="form-control text-info" name="username" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="mail" class="col-md-2 col-form-label">Email:</label>
                    <div class="col input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" id="mail" class="form-control text-info" name="mail"
                            pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="password" class="col-md-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" class="form-control text-info" name="password" required
                            title="Debe contener al menos un número y una mayúscula y una minúscula, y al menos 8 o más carácteres" />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="address" class="col-md-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" id="address" class="form-control text-info" name="address" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="floor" class="col-md-2 col-form-label">Floor:</label>
                    <div class="col-sm-10">
                        <input type="text" id="floor" class="form-control text-info" name="floor" required />
                    </div>
                </div>

                <div class="form-group row g-3 mt-1 mx-auto">
                    <label for="phone" class="col-md-2 col-form-label">Phone:</label>
                    <div class="col-sm-10">
                        <input type="tel" id="phone" class="form-control text-info" name="phone" required />
                    </div>
                </div>

                <div class="row g-3 mt-2  d-grid col-6 mx-auto">
                    <input class="btn btn-primary btn-lg nutton" type="submit" value="Edit User" name="submit" />
                </div>

            </fieldset>
        </form>
    </div>
</body>

</html>