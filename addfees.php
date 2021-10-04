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
        <h1 style="color: White;padding:15px 0 0 0;">Add Fees / Payment</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->

    <div>
        <div>
            <form action="search-student-fees.php" method="GET">
                <div style="text-align: center; background-color:#eee;border-radius:20px;">
                <h3 style="padding-top:20px;">Search Student</h3>
                <input type="text" name="search" class="addinput" style="margin:20px 20px" placeholder="Enter students ID number" required="">
                 <input type="text" name="session" class="addinput" style="margin:20px 20px" placeholder="Enter Students Session Name" required="">
 
  <input type="text" name="program" class="addinput" style="margin:20px 20px" placeholder="Enter students Program" required="">
 
 

                <input type="submit" name="submit" value="Search" class="logbtn">
                </div>
            </form>
        </div>
    </div>