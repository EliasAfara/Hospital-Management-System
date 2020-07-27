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
    <title>Patient Search</title>

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
                        <h2>&nbsp;Search for a Patient</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="row">
                                    <div class="col-md-10">
                                        <form role="form" method="post" name="search">

                                            <div class="form-group">
                                                <label for="doctorname">
                                                    Search by Name or Mobile Number
                                                </label>
                                                <input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true'>
                                            </div>

                                            <button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
                                                Search
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-11">
                                        <?php
                                        if(isset($_POST['search']))
                                        {

                                        $sdata=$_POST['searchdata'];
                                        ?>
                                        <h4 align="center" style="font-size:20px;color:blue">Result against "<?php echo $sdata;?>"</h4>
                                        <br>
                                        <table class="table table-hover" id="sample-table-1">
                                            <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Patient Name</th>
                                                <th>Patient Contact Number</th>
                                                <th>Patient Gender </th>
                                                <th>Creation Date </th>
                                                <th>Updation Date </th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php

                                            $sql=mysqli_query($con,"select * from tblpatient where PatientName like '%$sdata%'|| PatientContno like '%$sdata%'");
                                            $num=mysqli_num_rows($sql);
                                            if($num>0){
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($sql))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td class="center"><?php echo $cnt;?>.</td>
                                                        <td class="hidden-xs"><?php echo $row['PatientName'];?></td>
                                                        <td><?php echo $row['PatientContno'];?></td>
                                                        <td><?php echo $row['PatientGender'];?></td>
                                                        <td><?php echo $row['CreationDate'];?></td>
                                                        <td><?php echo $row['UpdationDate'];?>
                                                        </td>
                                                        <td>

                                                            <a href="view-patient.php?viewid=<?php echo $row['ID'];?>"><i class="fa fa-eye"></i></a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $cnt=$cnt+1;
                                                } } else { ?>
                                                <tr>
                                                    <td colspan="8"> No record found against this search</td>

                                                </tr>

                                            <?php } }?></tbody>
                                        </table>
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
