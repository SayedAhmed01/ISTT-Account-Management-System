
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
        <h1 style="color: White;padding:15px 0 0 0;">Dashboard</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h3 style="color: White;padding:15px 10px 0 0;">Logout</h3>
    </a>
    </div>
</div>

<div class="dashbody">
<?php include "sidebar.php";?>

 <?php 
        if(isset($_POST['submit'])){
            include "config.php";
            
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            
            $c_pass = mysqli_real_escape_string($conn, $_POST['cpass']);
            $n_pass = mysqli_real_escape_string($conn, $_POST['npass']);
            $con_pass = mysqli_real_escape_string($conn, $_POST['conpass']);
            $query = mysqli_query($conn,"SELECT * FROM  admin_info WHERE username  ='$uname' AND password ='$c_pass'");
                
                $num = mysqli_fetch_array($query);
                if($num>0){

                    $con ="UPDATE admin_info SET password = '$n_pass' WHERE username ='$uname'";
                $reult = mysqli_query($conn,$con) or die("Query Failed");
                echo "Password change Successfully";
                
                
                }
                else{
                   echo "Password do not change";

    
                   
                }
            }
            

?>