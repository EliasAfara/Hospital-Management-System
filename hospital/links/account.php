<?php
require_once "authController.php"
?>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/main.css">
    <title>Hospital Managment System</title>
</head>
<body>
<header>
    <img src="../images/banner.jpg" id="banner">
</header>
<nav class="navbar bg-dark navbar-default">
    <ul class="nav navbar-nav">
        <li><a href="../index.php">Home</a></li>
        <li><a href="account.php">Account</a> </li>
        <li><a href="../links/login.php">Log Out</a></li>
    </ul>
</nav>

<main>
    <div class="container-fluid bg-light">
        <h1>Account info</h1>
        <ul style="list-style: none">
            <li>Username: <?php echo($_SESSION['username']) ?></li>
            <li>First Name: <?php echo($_SESSION['fname']) ?></li>
            <li>Family Name: <?php echo($_SESSION['lname']) ?></li>
        </ul>
    </div>
</main>

</body>
</html>
