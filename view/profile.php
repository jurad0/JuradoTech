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

    <title>Profile</title>
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
    <div class="container my-5" id="profile_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <div class="">
                <div class="card h-100" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <p class="card-text">Username:
                            <?= $user->username; ?>
                        </p>
                        <p class="card-text">Email:
                            <?= $user->email; ?>
                        </p>
                        <p class="card-text fw-bold">Phone:
                            <?= $user->phone ?>
                        </p>
                        <p class="card-text">Address:
                            <?= $user->address; ?>
                        </p>
                        <p class="card-text">Floor:
                            <?= $user->floor; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a href="../controller/EditUserController.php">Edit Profile</a>
    </div>

    <div class="container mb-5" id="purchases_container">
        <h3>Old lastPurchases</h3>
        <div class="d-flex flex-column gap-4">
            <?php foreach ($lastPurchases as $cart): ?>
                <div class="">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text fw-bold">Cart id:
                                <?= $cart->order_id ?>
                            </p>
                            <p class="card-text">Date:
                                <?= $cart->order_date ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button>Show Cart Items</button>
                        </div>
                    </div>
                </div>
                <?php $totalPrice = 0; ?>
                <?php foreach ($cart->items as $item): ?>
                    <?php $totalPrice += $item["item"]->price * $item["quantity"]; ?>
                    <div class="card h-100" style="width: 18rem;">
                        <div class="img-div"><img src="data:image/jpeg;base64,<?= $item["item"]->image; ?>" class="card-img-top"
                                alt="image"></div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $item["item"]->name; ?>
                            </h5>
                            <p class="card-text">
                                <?= $item["item"]->description; ?>
                            </p>
                            <p class="card-text fw-bold">
                                <?= $item["item"]->price * $item["quantity"] . "€" ?>
                            </p>
                            <p class="card-text">Quantity:
                                <?= $item["quantity"]; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <p>Total Price:
                    <?= $totalPrice . "€" ?>
                </p>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>