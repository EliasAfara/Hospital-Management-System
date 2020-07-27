<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if(isset($_GET['cancel']))
{
    mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");
    $_SESSION['msg']="Your appointment canceled !!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Appointment History</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

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
                        <h2>&nbsp;Appointment History</h2>
                        <?php include('include/header.php');?>
                        <!-- END HEADER DESKTOP-->

                        <!-- MAIN CONTENT-->
                        <div class="main-content" >
                            <div class="wrap-content container" id="container">
                                <div class="container-fluid container-fullw bg-white">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                                                <?php echo htmlentities($_SESSION['msg']="");?></p>
                                            <table class="table table-hover" id="sample-table-1">
                                                <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th class="hidden-xs">Doctor Name</th>
                                                    <th>Specialization</th>
                                                    <th>Consultancy Fee</th>
                                                    <th>Appointment Date / Time </th>
                                                    <th>Appointment Creation Date  </th>
                                                    <th>Current Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sql=mysqli_query($con,"select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='".$_SESSION['id']."'");
                                                $cnt=1;
                                                while($row=mysqli_fetch_array($sql))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td class="center"><?php echo $cnt;?>.</td>
                                                        <td class="hidden-xs"><?php echo $row['docname'];?></td>
                                                        <td><?php echo $row['doctorSpecialization'];?></td>
                                                        <td><?php echo $row['consultancyFees'];?></td>
                                                        <td><?php echo $row['appointmentDate'];?> / <?php echo
                                                            $row['appointmentTime'];?>
                                                        </td>
                                                        <td><?php echo $row['postingDate'];?></td>
                                                        <td>
                                                            <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                                                            {
                                                                echo "Active";
                                                            }
                                                            if(($row['userStatus']==0) && ($row['doctorStatus']==1))
                                                            {
                                                                echo "Cancel by You";
                                                            }

                                                            if(($row['userStatus']==1) && ($row['doctorStatus']==0))
                                                            {
                                                                echo "Cancel by Doctor";
                                                            }



                                                            ?></td>
                                                        <td >
                                                            <div class="visible-md visible-lg hidden-sm hidden-xs">
                                                                <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                                                                { ?>


                                                                    <a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                                                <?php } else {

                                                                    echo "Canceled";
                                                                } ?>
                                                            </div>
                                                           </td>
                                                    </tr>

                                                    <?php
                                                    $cnt=$cnt+1;
                                                }?>
                                                </tbody>
                                            </table>
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
