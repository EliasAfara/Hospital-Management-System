<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $sql=mysqli_query($con,"Update users set email='$email' where id='".$_SESSION['id']."'");
    if($sql)
    {
        $msg="Your email updated Successfully";


    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Change email</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="../images/icon/hms.png" alt="HMS" />
            </a>
        </div>
        <?php include('include/sidebar.php');?>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <h2>&nbsp;Change Patient Email</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="container-fluid container-fullw bg-white">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 style="color: green; font-size:18px; ">
                                                <?php if($msg) { echo htmlentities($msg);}?> </h5>
                                            <div class="row margin-top-30">
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="panel panel-white">
                                                       <br>
                                                        <div class="panel-body">
                                                            <form name="registration" id="updatemail"  method="post">
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        User Email:
                                                                    </label>
                                                                    <input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="abc@email.com" required>

                                                                    <span id="user-availability-status1" style="font-size:12px;"></span>
                                                                </div>







                                                                <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                                    Update
                                                                </button>
                                                            </form><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- END MAIN CONTENT-->
                    </div>
                </div>
                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <!-- Main JS-->
                <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
