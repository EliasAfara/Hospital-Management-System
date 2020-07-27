<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{	$docspecialization=$_POST['Doctorspecialization'];
    $docname=$_POST['docname'];
    $docaddress=$_POST['clinicaddress'];
    $docfees=$_POST['docfees'];
    $doccontactno=$_POST['doccontact'];
    $docemail=$_POST['docemail'];
    $password=md5($_POST['npass']);
    $sql=mysqli_query($con,"insert into doctors(specilization,doctorName,address,docFees,contactno,docEmail,password) values('$docspecialization','$docname','$docaddress','$docfees','$doccontactno','$docemail','$password')");
    if($sql)
    {
        echo "<script>alert('Doctor info added Successfully');</script>";
        echo "<script>window.location.href ='manage-doctors.php'</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Doctor Specialization</title>

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
            if(document.adddoc.npass.value!= document.adddoc.cfpass.value)
            {
                alert("Password and Confirm Password Field do not match  !!");
                document.adddoc.cfpass.focus();
                return false;
            }
            return true;
        }
    </script>


    <script>
        function checkemailAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data:'emailid='+$("#docemail").val(),
                type: "POST",
                success:function(data){
                    $("#email-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
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
                        <h2>&nbsp;Add a Doctor</h2>
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

                                                        <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                                                            <div class="form-group">
                                                                <label for="DoctorSpecialization">
                                                                    Doctor Specialization
                                                                </label>
                                                                <select name="Doctorspecialization" class="form-control" required="true">
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
                                                                <label for="doctorname">
                                                                    Doctor Name
                                                                </label>
                                                                <input type="text" name="docname" class="form-control"  placeholder="Enter Doctor Name" required="true">
                                                            </div>


                                                            <div class="form-group">
                                                                <label for="address">
                                                                    Doctor Clinic Address
                                                                </label>
                                                                <textarea name="clinicaddress" class="form-control"  placeholder="Enter Doctor Clinic Address" required="true"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Consultancy Fees
                                                                </label>
                                                                <input type="text" name="docfees" class="form-control"  placeholder="Enter Doctor Consultancy Fees" required="true">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Contact no
                                                                </label>
                                                                <input type="text" name="doccontact" class="form-control"  placeholder="Enter Doctor Contact no" required="true">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="fess">
                                                                    Doctor Email
                                                                </label>
                                                                <input type="email" id="docemail" name="docemail" class="form-control"  placeholder="Enter Doctor Email id" required="true" onBlur="checkemailAvailability()">
                                                                <span id="email-availability-status"></span>
                                                            </div>




                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">
                                                                    Password
                                                                </label>
                                                                <input type="password" name="npass" class="form-control"  placeholder="New Password" required="required">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="exampleInputPassword2">
                                                                    Confirm Password
                                                                </label>
                                                                <input type="password" name="cfpass" class="form-control"  placeholder="Confirm Password" required="required">
                                                            </div>



                                                            <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                                                                Submit
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
