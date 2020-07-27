<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$id=intval($_GET['id']);// get value
if(isset($_POST['submit']))
{
    $docspecialization=$_POST['doctorspecilization'];
    $sql=mysqli_query($con,"update  doctorSpecilization set specilization='$docspecialization' where id='$id'");
    $_SESSION['msg']="Doctor Specialization updated successfully !!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Edit Doctor Specialization</title>

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
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
                        <h2>&nbsp;Edit Doctor Specialization</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row margin-top-30">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="panel panel-white">

                                                        <div class="panel-body">
                                                            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                                                <?php echo htmlentities($_SESSION['msg']="");?></p>
                                                            <form role="form" name="dcotorspcl" method="post" >
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">
                                                                        Edit Doctor Specialization
                                                                    </label>

                                                                    <?php

                                                                    $id=intval($_GET['id']);
                                                                    $sql=mysqli_query($con,"select * from doctorSpecilization where id='$id'");
                                                                    while($row=mysqli_fetch_array($sql))
                                                                    {
                                                                        ?>		<input type="text" name="doctorspecilization" class="form-control" value="<?php echo $row['specilization'];?>" >
                                                                    <?php } ?>
                                                                </div>




                                                                <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                                    Update
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
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
<script src="../vendor/jquery-3.2.1.min.js"></script>
<script src="../vendor/animsition/animsition.min.js"></script>
<!-- Main JS-->
<script src="../../js/main.js"></script>

</body>

</html>
<!-- end document-->
