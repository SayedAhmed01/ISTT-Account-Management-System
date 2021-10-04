<style>
.form{

    background-color: #ABEBC6!important;
}
</style>

<?php
    include "config.php";
    session_start();
    if(!isset($_SESSION['username'])){
        header("location:index.php");
    }
include "header.php";?>
<!---------- Topbar --------->
<div class="topbar">
    <div class="topwrap">
        <img src="imgs/istt-logo.png">
        <h1 style="color: White;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Change Password</h1>
    </div>
    <div>
    	<a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h3 style="color: White;padding:15px 10px 0 0;">Logout</h3>
    </a>
    </div>
</div>

<div class="form">
            <form action="change-password1.php" method="POST" style="text-align: center; border-radius:20px;">
                
                <input type="text" name="uname" class="addinput" style="margin:20px 20px" placeholder="Enter User Name" autocomplete="off" required><br>
                <input type="Password" name="cpass" class="addinput" style="margin:20px 20px" placeholder="Enter Current Password" autocomplete="off" required><br>
                <input type="Password" name="npass" class="addinput" style="margin:20px 20px" placeholder="Enter New Password" autocomplete="off" required><br>
                <input type="Password" name="conpass" class="addinput" style="margin:20px 20px" placeholder="Enter confirm Password" autocomplete="off" required><br>
                <input type="submit" name="submit" value="Update" class="logbtn">
            </form>
        </div>
