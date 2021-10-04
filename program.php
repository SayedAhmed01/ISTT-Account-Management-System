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
        <h1 style="color: White;padding:15px 0 0 0;">Program</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>



<div style="display: flex;justify-content:space-evenly;margin:50px 0;">
    <div>
        <h2><u>Program</u></h2>
        <ol class="sesol">
<?php 
    include "config.php";
    $sql = "SELECT * FROM course";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

?>
            <a href="program-students.php?program=<?php echo $row['course_name']?>"><li><?php echo $row['course_name']?></li></a>
<?php       
        }
    }
?>
        </ol>
    </div>
    <div>
        <div>
            <form action="save-program.php" method="POST" style="text-align: center; background-color:#82E0AA;border-radius:20px;">
                <h3 style="padding-top:20px;">Add New Program</h3>
                <input type="text" name="pog" class="addinput" style="margin:20px 20px" placeholder="Enter Program Name"><br>
                <input type="submit" name="submit" value="Add" class="logbtn">
            </form>
        </div>
    </div>
</div>

<?php include "footer.php";?>