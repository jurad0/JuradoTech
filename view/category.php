<?php
/*if(!isset($_SESSION["usuario"])){
    header("Location: controller/LoginFormController.php");
}*/
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
    <!-- ORDER BY -->
    <div class="container mt-5">
        <div class=" px-2 mb-4 d-flex flex-row gap-5 flex-row align-items-center ms-auto">



            <p class="fw-bold m-0 ms-auto">Order By:</p>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="priceDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Price
                </button>
                <ul class="dropdown-menu" aria-labelledby="priceDropdown">
                    <li><a class="dropdown-item" href="?price=higher">Higher Price</a></li>
                    <li><a class="dropdown-item" href="?price=lower">Lower Price</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="nameDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Name
                </button>
                <ul class="dropdown-menu" aria-labelledby="nameDropdown">
                    <li><a class="dropdown-item" href="?name=az">A-Z</a></li>
                    <li><a class="dropdown-item" href="?name=za">Z-A</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="priceDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="priceDropdown">
                    <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=1">ComputerParts</a>
                    </li>
                    <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=2">Peripherals</a></li>
                    <li><a class="dropdown-item" href="../controller/CategoryController.php?cat=3">Keys</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Cart Modal -->


    <!--content-->

    <div class="container mb-5" id="product_container">
        <div class="d-flex flex-wrap gap-4 justify-content-around">
            <?php foreach ($productsCat as $pro): ?>
                <?php $catName = getCategoryNameByCategoryId($pdo, $pro->category_id) ?>
                <div class="">
                    <div class="card h-100" style="width: 18rem;">
                        <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image; ?>" class="card-img-top"
                                alt="image"></div>

                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $pro->name; ?>
                            </h5>
                            <p class="card-text">
                                <?= $pro->description; ?>
                            </p>
                            <p class="card-text fw-bold">
                                <?= $pro->price . "€" ?>
                            </p>
                            <p class="card-text">Category:
                                <?= $catName; ?>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <?php if ($admin): ?>
                                <a class="button btn btn-secondary btn-block w-50"
                                    href="../controller/ProductCrudController.php?id=<?= $pro->id ?>">Edit</a>
                            <?php else: ?>
                                <a class="button btn btn-primary btn-block w-75"
                                    href="../controller/CookieController.php?id=<?= $pro->id ?>&type=<?= $pro->type ?>">Buy
                                    Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>