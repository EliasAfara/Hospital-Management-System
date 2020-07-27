<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

date_default_timezone_set('Asia/Beirut');// change according timezone
$currentTime = date('d-m-Y h:i:s A', time());

$_SESSION['msg1'] = "";
if(isset($_POST['submit']))
{
    $sql=mysqli_query($con,"SELECT password FROM  doctors where password='".md5($_POST['cpass'])."' && id='".$_SESSION['id']."'");
    $num=mysqli_fetch_array($sql);
    if($num>0)
    {
        $con=mysqli_query($con,"update doctors set password='".md5($_POST['npass'])."' where id='".$_SESSION['id']."'");
        $_SESSION['msg1']="Password Changed Successfully !!";
    }
    else
    {
        $_SESSION['msg1']="Old Password not match !!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Change Password</title>

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

    <script type="text/javascript">
        function valid()
        {
            if(document.chngpwd.cpass.value=="")
            {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.cpass.focus();
                return false;
            }
            else if(document.chngpwd.npass.value=="")
            {
                alert("New Password Filed is Empty !!");
                document.chngpwd.npass.focus();
                return false;
            }
            else if(document.chngpwd.cfpass.value=="")
            {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.cfpass.focus();
                return false;
            }
            else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.cfpass.focus();
                return false;
            }
            return true;
        }
    </script>



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
                        <h2>&nbsp;Change Password</h2>
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
                                                        <p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
                                                            <?php echo htmlentities($_SESSION['msg1']="");?></p>
                                                        <form role="form" name="chngpwd" method="post" onSubmit="return valid();">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">
                                                                    Current Password
                                                                </label>
                                                                <input type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">
                                                                    New Password
                                                                </label>
                                                                <input type="password" name="npass" class="form-control"  placeholder="New Password">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">
                                                                    Confirm Password
                                                                </label>
                                                                <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password">
                                                            </div>



                                                            <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                                Submit
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
