
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="../images/icon/user.png" alt="Default User Picture" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php $query=mysqli_query($con,"select fullName from users where id='".$_SESSION['id']."'");
                                    while($row=mysqli_fetch_array($query))
                                    {
                                        echo $row['fullName'];
                                    }
                                    ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="edit-profile.php">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="change-password.php">
                                            <i class="zmdi zmdi-settings"></i>Change Password</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>