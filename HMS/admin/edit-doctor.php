<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
    $docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
    $docaddress=$_POST['clinicaddress'];
    $docfees=$_POST['docfees'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
    if($sql)
    {
        $msg="Doctor Details updated Successfully";

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Edit Doctor Information</title>

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
                        <h2>&nbsp;Edit Doctor Information</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 style="color: green; font-size:18px; ">
                                            <?php if($msg) { echo htmlentities($msg);}?> </h5>
                                        <div class="row margin-top-30">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="panel panel-white">

                                                    <div class="panel-body">
                                                        <?php $sql=mysqli_query($con,"select * from doctors where id='$did'");
                                                        while($data=mysqli_fetch_array($sql))
                                                        {
                                                        ?>
                                                        <h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>
                                                        <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']);?></p>
                                                        <?php if($data['updationDate']){?>
                                                            <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
                                                        <?php } ?>
                                                        <hr />
                                                        <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                            <div class="form-group">
                                                                <label for="DoctorSpecialization">
                                                                    Doctor Specialization
                                                                </label>
                                                                <select name="Doctorspecialization" class="form-control" required="required">
                                                                    <option value="<?php echo htmlentities($data['specilization']);?>">
                                                                        <?php echo htmlentities($data['specilization']);?></option>
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
                                                                <label for="doctorname">
                                                                    Doctor Name
                                                                </label>
                                                                <input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']);?>" >
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="address">
                                                                    Doctor Clinic Address
                                                                </label>
                                                                <textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Consultancy Fees
                                                                </label>
                                                                <input type="text" name="docfees" class="form-control" required="required"  value="<?php echo htmlentities($data['docFees']);?>" >
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Contact no
                                                                </label>
                                                                <input type="text" name="doccontact" class="form-control" required="required"  value="<?php echo htmlentities($data['contactno']);?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Email
                                                                </label>
                                                                <input type="email" name="docemail" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['docEmail']);?>">
                                                            </div>




                                                            <?php } ?>


                                                            <button type="submit" name="submit" class="btn btn-o btn-primary">
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
