<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $eid=$_GET['editid'];
    $patname=$_POST['patname'];
    $patcontact=$_POST['patcontact'];
    $patemail=$_POST['patemail'];
    $gender=$_POST['gender'];
    $pataddress=$_POST['pataddress'];
    $patage=$_POST['patage'];
    $medhis=$_POST['medhis'];
    $sql=mysqli_query($con,"update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
    if($sql)
    {
        echo "<script>alert('Patient info updated Successfully');</script>";
        header('location:manage-patient.php');

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Edit Patient</title>

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
                        <h2>&nbsp;Edit Patient</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row margin-top-30">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="panel panel-white">
                                                    <div class="panel-body">
                                                        <form role="form" name="" method="post">
                                                            <?php
                                                            $eid=$_GET['editid'];
                                                            $ret=mysqli_query($con,"select * from tblpatient where ID='$eid'");
                                                            $cnt=1;
                                                            while ($row=mysqli_fetch_array($ret)) {

                                                                ?>
                                                                <div class="form-group">
                                                                    <label for="doctorname">
                                                                        Patient Name
                                                                    </label>
                                                                    <input type="text" name="patname" class="form-control"  value="<?php  echo $row['PatientName'];?>" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        Patient Contact no
                                                                    </label>
                                                                    <input type="text" name="patcontact" class="form-control"  value="<?php  echo $row['PatientContno'];?>" required="true" maxlength="10" pattern="[0-9]+">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        Patient Email
                                                                    </label>
                                                                    <input type="email" id="patemail" name="patemail" class="form-control"  value="<?php  echo $row['PatientEmail'];?>" readonly='true'>
                                                                    <span id="email-availability-status"></span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Gender: </label>
                                                                    <?php  if($row['Gender']=="Female"){ ?>
                                                                        <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
                                                                        <input type="radio" name="gender" id="gender" value="male">Male
                                                                    <?php } else { ?>
                                                                        <label>
                                                                            <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
                                                                            <input type="radio" name="gender" id="gender" value="Female">Female
                                                                        </label>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="address">
                                                                        Patient Address
                                                                    </label>
                                                                    <textarea name="pataddress" class="form-control" required="true"><?php  echo $row['PatientAdd'];?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        Patient Age
                                                                    </label>
                                                                    <input type="text" name="patage" class="form-control"  value="<?php  echo $row['PatientAge'];?>" required="true">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        Medical History
                                                                    </label>
                                                                    <textarea type="text" name="medhis" class="form-control"  placeholder="Enter Patient Medical History(if any)" required="true"><?php  echo $row['PatientMedhis'];?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="fess">
                                                                        Creation Date
                                                                    </label>
                                                                    <input type="text" class="form-control"  value="<?php  echo $row['CreationDate'];?>" readonly='true'>
                                                                </div>
                                                            <?php } ?>
                                                            <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                                Update
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="panel panel-white">
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
