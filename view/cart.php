<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
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
    <div class="container mt-5">
        <?php
        require_once("../connection/Connection.php");
        require_once("../model/orderImpl.php");

        //SET Items Carrito from Cookies
        if (isset($_COOKIE['aimaiLaCookie'])) {
            // Decode and unserialize the data
            $decodedData = unserialize(base64_decode($_COOKIE['aimaiLaCookie']));
            $items = [];
            foreach ($decodedData as $decodedItem) {
                $item = [];
                if ($decodedItem["type"] == 1) {
                    $prod = selectProductById($pdo, $decodedItem["id"]);
                    $item = [
                        "item" => $prod,
                        "quantity" => $decodedItem["quantity"]
                    ];
                } else {
                    $serv = selectServiceById($pdo, $decodedItem["id"]);
                    $item = [
                        "item" => $serv,
                        "quantity" => $decodedItem["quantity"]
                    ];
                }
                array_push($items, $item);
            }
        } else {
            echo "<h5 class='alert alert-info'>Cart is empty, Go shopping!</h5>";
        }
        ?>

        <!-- View Cart Items -->
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php if (isset($_COOKIE['aimaiLaCookie']) && !empty($items)): ?>
                <?php $totalPrice = 0; ?>
                <?php foreach ($items as $item): ?>
                    <?php
                    $pro = $item["item"];
                    $totalPrice += $item["quantity"] * $pro->price;
                    ?>
                    <div class="col">
                        <div class="card h-100">
                            <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image ?>" class="card-img-top"
                                    alt="Product Image"></div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $pro->name; ?>
                                </h5>
                                <p class="card-text">
                                    <?= $pro->description; ?>
                                </p>
                                <p class="card-text fw-bold">
                                    <?= $pro->price * $item["quantity"] . "€" ?>
                                </p>
                                <p class="card-text fw-bold">
                                    <?= "Quantity: " . $item["quantity"] ?>
                                </p>
                            </div>
                            <a href="../controller/CartController.php?id=<?= $pro->id ?>&type=<?= $pro->type ?>"
                                class="btn btn-danger">Remove</a>
                        </div>
                    </div>
                <?php endforeach; ?>
                <p class="mt-3">
                    <?= "Total price: " . $totalPrice . "€" ?>
                </p>
                <div class="d-flex flex-row justify-content-around align-items-center mt-3">
                    <a href="../controller/CartController.php?empty" class="btn btn-warning">Empty Cart</a>
                    <a href="../controller/BuyController.php" class="btn btn-success">Checkout</a>
                </div>
            <?php endif ?>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>