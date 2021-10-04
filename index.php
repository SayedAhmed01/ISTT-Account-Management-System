<?php include "header.php";?>
<div class="logtopbar">
    <h1> WELCOME TO ACCOUNTS OF ISTT </h1>
</div>

<div class="login">
    <div class="logimg">
        <img src="imgs/ISTT-Main.png">
    </div>
    <div style="text-align: center;">
    <h3>Please Login</h3>

    
        <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" class="logform">
            <div style="margin-top:20px;">
                <h4>Enter Username</h4>
                <input type="text" name="username" class="loginput" autocomplete="off" required>
            </div>
            <div>
                <h4>Enter Password</h4>
                <input type="password" name="password" class="loginput" required>
            </div>
            <input type="submit" name="submit" value="LOGIN" class="logbtn">
        </form>
        <?php 
        if(isset($_POST['submit'])){
            include "config.php";

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin_info WHERE username = '{$username}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql) or die("Query Failed");

        if(mysqli_num_rows($result)){
            while($row = mysqli_fetch_assoc($result)){
                session_start();
                $_SESSION["username"] = $row["username"];

                header("location:dashboard.php");

            }
        }else{
            echo "<div style='text-align:center;'><h4 style='color:red;'>Username Or Password Wrong</h4></div>";
        }
    }
    ?>
    </div>
</div>

<?php include "footer.php";?>