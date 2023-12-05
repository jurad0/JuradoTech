<!-- register_form.php -->
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
    <title>Register Form</title>
</head>

<body>
    <h2>Register Form</h2>
    <?php

    ?>
    <form action="../controller/RegisterController.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="mail">Email:</label>
        <input type="email" id="mail" name="mail" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="floor">Floor:</label>
        <input type="text" id="floor" name="floor" required>

        <!-- Assuming rolId is predefined, if not, you may need to handle it differently -->
        <input type="hidden" name="rolId" value="2">

        <button type="submit" name="submit">Register</button>
        <a href="../controller/LoginFormController.php">Login into Account</a>
    </form>
</body>

</html>