<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include "header.php";?>
<div class="topbar">
    <div class="topwrap">
        <img src="imgs/istt-logo.png">
        <h1 style="color: White;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Session</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>



<div style="display: flex;justify-content:space-evenly;margin:50px 0;">
    <div>
        <h2><u>Sessions</u></h2>
        <ol class="sesol">
<?php 
    include "config.php";
    $sql = "SELECT * FROM sessions";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

?>
            <a href="session-students.php?session=<?php echo $row['session_name']?>"><li><?php echo $row['session_name']?></li></a>
<?php       
        }
    }
?>
        </ol>
    </div>
    <div>
        <div>
            <form action="save-session.php" method="POST" style="text-align: center; background-color:#28B463   ;border-radius:20px;">
                <h3 style="padding-top:20px;">Add New Session</h3>
                <input type="text" name="ses" class="addinput" style="margin:20px 20px" placeholder="Enter Session Name" required=""><br>
                <input type="submit" name="submit" value="Add" class="logbtn">
            </form>
        </div>
    </div>
</div>

<?php include "footer.php";?>