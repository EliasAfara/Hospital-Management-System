<?php
require_once 'links/authController.php';
if(!isset($_SESSION['loggedIn'])){
    header("Location: links/login.php");
    exit;
}
?>

<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/main.css">
    <title>Hospital Managment System</title>
</head>
<body>
<header>
<img src="images/banner.jpg" id="banner">
</header>
<nav class="navbar bg-dark navbar-default">
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="links/account.php">Account</a> </li>
            <li><a href="links/logout.php">Log Out</a></li>
        </ul>
</nav>

<main>
<div class="container-fluid bg-light">
        <h1>Welcome!</h1>
</div>
</main>

</body>
</html>
