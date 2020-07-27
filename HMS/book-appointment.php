<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
    $specilization=$_POST['Doctorspecialization'];
    $doctorid=$_POST['doctor'];
    $userid=$_SESSION['id'];
    $fees=$_POST['fees'];
    $appdate=$_POST['appdate'];
    $time=$_POST['apptime'];
    $userstatus=1;
    $docstatus=1;
    $query=mysqli_query($con,"insert into appointment(doctorSpecialization, doctorId, userId, consultancyFees, appointmentDate, appointmentTime, userStatus, doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
    if($query)
    {
        echo "<script>alert('Your appointment successfully booked');</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->

    <title>User Book Appointment</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

    <script>
        function getdoctor(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data:'specilizationid='+val,
                success: function(data){
                    $("#doctor").html(data);
                }
            });
        }
    </script>


    <script>
        function getfee(val) {
            $.ajax({
                type: "POST",
                url: "get_doctor.php",
                data:'doctor='+val,
                success: function(data){
                    $("#fees").html(data);
                }
            });
        }
    </script>


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
        <?php error_reporting(0);?>
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <h2>&nbsp;Book Appointment</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <!-- start: BASIC EXAMPLE -->
                                <div class="container-fluid container-fullw bg-white">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="row margin-top-30">
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="panel panel-white">
                                                        <br>
                                                        <div class="panel-body">
                                                            <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                                                                <?php echo htmlentities($_SESSION['msg1']="");?></p>
                                                            <form role="form" name="book" method="post" >

                                                                <div class="form-group">
                                                                    <label for="DoctorSpecialization">
                                                                        Doctor Specialization
                                                                    </label>
                                                                    <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                                                                        <option value="">Select Specialization</option>
                                                                        <?php $ret=mysqli_query($con,"select * from doctorspecilization");
                                                                        while($row=mysqli_fetch_array($ret))
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo htmlentities($row['specilization']);?>">
                                                                                <?php echo htmlentities($row['specilization']);?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="doctor">
                                                                        Doctors ( Doctors are shown according to the chosen specilization )
                                                                    </label>
                                                                    <select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
                                                                        <option value="">Select Doctor</option>
                                                                        <?php $ret=mysqli_query($con,"select * from doctors");
                                                                        while($row=mysqli_fetch_array($ret))
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo htmlentities($row['doctorName']);?>">
                                                                                <?php echo htmlentities($row['doctorName']);?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="consultancyfees">
                                                                        Consultancy Fees
                                                                    </label>
                                                                    <select name="fees" class="form-control" id="fees"  readonly>

                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="AppointmentDate">
                                                                        Date
                                                                    </label>
                                                                    <input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Appointmenttime">
                                                                        Time
                                                                    </label>
                                                                    <input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
                                                                </div>
                                                                <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                                    Submit
                                                                </button>
                                                            </form>
                                                            <br>
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
                <!-- start: MAIN JAVASCRIPTS -->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                <script src="vendor/modernizr/modernizr.js"></script>
                <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                <script src="vendor/switchery/switchery.min.js"></script>
                <!-- end: MAIN JAVASCRIPTS -->
                <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
                <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
                <script src="vendor/autosize/autosize.min.js"></script>
                <script src="vendor/selectFx/classie.js"></script>
                <script src="vendor/selectFx/selectFx.js"></script>
                <script src="vendor/select2/select2.min.js"></script>
                <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
                <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <!-- start: CLIP-TWO JAVASCRIPTS -->
                <script src="assets/js/main.js"></script>
                <!-- start: JavaScript Event Handlers for this page -->
                <script src="assets/js/form-elements.js"></script>
                <script>
                    jQuery(document).ready(function() {
                        Main.init();
                        FormElements.init();
                    });

                    $('.datepicker').datepicker({
                        format: 'yyyy-mm-dd',
                        startDate: '-3d'
                    });
                </script>
                <script type="text/javascript">
                    $('#timepicker1').timepicker();
                </script>
                <!-- end: JavaScript Event Handlers for this page -->
                <!-- end: CLIP-TWO JAVASCRIPTS -->

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
                <!-- Jquery JS-->
                <script src="vendor/jquery-3.2.1.min.js"></script>
                <script src="vendor/animsition/animsition.min.js"></script>
                <!-- Main JS-->
                <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
