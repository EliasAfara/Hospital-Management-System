<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['submit']))
{

    $vid=$_GET['viewid'];
    $bp=$_POST['bp'];
    $bs=$_POST['bs'];
    $weight=$_POST['weight'];
    $temp=$_POST['temp'];
    $pres=$_POST['pres'];


    $query.=mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
        echo '<script>alert("Medicle history has been added.")</script>';
        echo "<script>window.location.href ='manage-patient.php'</script>";
    }
    else
    {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>View Patient</title>

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
                        <h2>&nbsp;View Patient</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="row">
                                    <div class="col-md-11"><?php
                                        $vid=$_GET['viewid'];
                                        $ret=mysqli_query($con,"select * from tblpatient where ID='$vid'");
                                        $cnt=1;
                                        while ($row=mysqli_fetch_array($ret)) {
                                        ?>
                                        <table border="1" class="table table-bordered">
                                            <tr align="center">
                                                <td colspan="4" style="font-size:20px;color:blue">
                                                    Patient Details</td></tr>

                                            <tr>
                                                <th scope>Patient Name</th>
                                                <td><?php  echo $row['PatientName'];?></td>
                                                <th scope>Patient Email</th>
                                                <td><?php  echo $row['PatientEmail'];?></td>
                                            </tr>
                                            <tr>
                                                <th scope>Patient Mobile Number</th>
                                                <td><?php  echo $row['PatientContno'];?></td>
                                                <th>Patient Address</th>
                                                <td><?php  echo $row['PatientAdd'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Patient Gender</th>
                                                <td><?php  echo $row['PatientGender'];?></td>
                                                <th>Patient Age</th>
                                                <td><?php  echo $row['PatientAge'];?></td>
                                            </tr>
                                            <tr>

                                                <th>Patient Medical History(if any)</th>
                                                <td><?php  echo $row['PatientMedhis'];?></td>
                                                <th>Patient Reg Date</th>
                                                <td><?php  echo $row['CreationDate'];?></td>
                                            </tr>

                                            <?php }?>
                                        </table>
                                        <?php

                                        $ret=mysqli_query($con,"select * from tblmedicalhistory  where PatientID='$vid'");
                                        ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END MAIN CONTENT-->
                    </div>
                </div>

                <script src="../vendor/jquery/jquery.min.js"></script>
                <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
                <script src="../vendor/modernizr/modernizr.js"></script>
                <script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
                <script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                <script src="../vendor/switchery/switchery.min.js"></script>

                <!-- Jquery JS-->
                <script src="../vendor/jquery-3.2.1.min.js"></script>
                <script src="../vendor/animsition/animsition.min.js"></script>
                <!-- Main JS-->
                <script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->
