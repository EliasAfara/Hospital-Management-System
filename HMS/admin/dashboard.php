<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Admin Dashboard</title>

    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
    <link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

    <!-- <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">-->

    <!-- Main CSS-->
    <link href="../../css/theme.css" rel="stylesheet" media="all">



</head>

<body class="animsition">
<div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <a href="#">
                <img src="../../images/icon/hms.png" alt="HMS" />
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
                        <h2>&nbsp;Admin Dashboard</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <!-- start: BASIC EXAMPLE -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="panel panel-white no-radius text-center">
                                                <div class="panel-body">
                                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                                    <h2 class="StepTitle">Manage Users</h2>

                                                    <p class="links cl-effect-1">
                                                        <a href="manage-users.php">
                                                            <?php $result = mysqli_query($con,"SELECT * FROM users ");
                                                            $num_rows = mysqli_num_rows($result);
                                                            {
                                                                ?>
                                                                Total Users :<?php echo htmlentities($num_rows);  } ?>
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="panel panel-white no-radius text-center">
                                                <div class="panel-body">
                                                    <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
                                                    <h2 class="StepTitle">Manage Doctors</h2>

                                                    <p class="cl-effect-1">
                                                        <a href="manage-doctors.php">
                                                            <?php $result1 = mysqli_query($con,"SELECT * FROM doctors ");
                                                            $num_rows1 = mysqli_num_rows($result1);
                                                            {
                                                                ?>
                                                                Total Doctors :<?php echo htmlentities($num_rows1);  } ?>
                                                        </a>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="panel panel-white no-radius text-center">
                                            <div class="panel-body">
                                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                                <h2 class="StepTitle">Manage Patients</h2>

                                                <p class="links cl-effect-1">
                                                    <a href="manage-patient.php">
                                                        <?php $result = mysqli_query($con,"SELECT * FROM tblpatient ");
                                                        $num_rows = mysqli_num_rows($result);
                                                        {
                                                            ?>
                                                            Total Patients :<?php echo htmlentities($num_rows);
                                                        } ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="panel panel-white no-radius text-center">
                                            <div class="panel-body">
                                                <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                                <h2 class="StepTitle"> Appointments</h2>

                                                <p class="links cl-effect-1">
                                                    <a href="book-appointment.php">
                                                        <a href="appointment-history.php">
                                                            <?php $sql= mysqli_query($con,"SELECT * FROM appointment");
                                                            $num_rows2 = mysqli_num_rows($sql);
                                                            {
                                                                ?>
                                                                Total Appointments :<?php echo htmlentities($num_rows2);  } ?>
                                                        </a>
                                                    </a>
                                                </p>
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
                <script src="../vendor/jquery-3.2.1.min.js"></script>
                <script src="../vendor/animsition/animsition.min.js"></script>
                <!-- Main JS-->
                <script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->
