<!-- login_form.php -->
<?php
if (isset($_SESSION["usuario"])) {
    header("Location: ../controller/IndexController.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy6p8e+fnl3uBtST+6pDScUKM8aF7hjMz" crossorigin="anonymous">
</head>

<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>Login Form</h2>
            <form action="../controller/LoginController.php" method="post">
                <div class="form-group">
                    <label for="mail">Username:</label>
                    <input type="text" id="mail" name="mail" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                <a href="../view/register.php" class="ml-2 btn btn-link">Create Account</a>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"
        integrity="sha384-jZR0/Jz5D9u7twOGG+C9bZWpqIR6w7kFqPz7ZTK8fbsC7faaEa+EX6PI5pQbVC90" crossorigin="anonymous">
        </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min