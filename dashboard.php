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
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
        
    </div>
    </div>
    


<!---------- Topbar Ends Here --------->

<div class="dashbody">
<?php include "sidebar.php";?>
    <div>
        <div class="dashbody1">
            <div style="text-align: center; margin-top:20px";>

                <h2>Today's Accounts Status</h2>
            </div>
            <div class="calc">
                <div class="calc1">
                    <?php 
                        include "config.php";
                        $date_day = date("d");
$tql = "SELECT SUM(amount) FROM fees WHERE date_day = '{$date_day}'";
                        $tresult = mysqli_query($conn, $tql);
                        if($tresult){
                            $trow = mysqli_fetch_assoc($tresult);
                            
                    ?>
                    <h4 style="padding: 10px 0;">Total Income</h4>
                    <h1><?php echo $trow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                </div>
                <div class="calc2">
                <?php 
                        include "config.php";
                        $date_day = date("d");
                        $etql = "SELECT SUM(amount) FROM expenditure WHERE date_day = '{$date_day}'";
                        $etresult = mysqli_query($conn, $etql);
                        if($etresult){
                            $etrow = mysqli_fetch_assoc($etresult);
                            
                    ?>
                <h4 style="padding: 10px 0;">Total Expenditure</h4>
                    <h1><?php echo $etrow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                </div>
                
            </div>
        </div>
        <div class="dashbody1">
            <div style="text-align: center; margin-top:20px;">
                <h2>Monthly Accounts Status</h2>
            </div>
            <div class="calc">
                <div class="calc1">
                <?php 
                        include "config.php";
                        $date_month = date("M");
                        $mql = "SELECT SUM(amount) FROM fees WHERE date_month = '{$date_month}'";
                        $mresult = mysqli_query($conn, $mql);
                        if($mresult){
                            $mrow = mysqli_fetch_assoc($mresult);
                            
                    ?>
                    <h4 style="padding: 10px 0;">Total Income</h4>
                    <h1><?php echo $mrow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                </div>
                <div class="calc2">
                <?php 
                        include "config.php";
                        $date_month = date("M");
                $mtql = "SELECT SUM(amount) FROM expenditure WHERE date_month = '{$date_month}'";
                        $mtresult = mysqli_query($conn, $mtql);
                        if($mtresult){
                            $mtrow = mysqli_fetch_assoc($mtresult);
                            
                    ?>
                <h4 style="padding: 10px 0;">Total Expenditure</h4>
                    <h1><?php echo $mtrow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                </div>
                
            </div>
        </div>
        <div class="dashbody1">
            <div style="text-align: center; margin-top:20px;">
                <h2>Yearly Accounts Status</h2>
            </div>
            <div class="calc">
                <div class="calc1">
                <?php 
                        include "config.php";
                        $date_year = date("Y");
                        $yql = "SELECT SUM(amount) FROM fees WHERE date_year = {$date_year}";
                        $yresult = mysqli_query($conn, $yql);
                        if($yresult){
                            $yrow = mysqli_fetch_assoc($yresult);
                            
                    ?>
                    <h4 style="padding: 10px 0;">Total Income</h4>
                    <h1><?php echo $yrow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                
                </div>
                <div class="calc2">
                <?php 
                        include "config.php";
                        $date_year = date("Y");
                        $eytql = "SELECT SUM(amount) FROM expenditure WHERE date_year = '{$date_year}'";
                        $eytresult = mysqli_query($conn, $eytql);
                        if($eytresult){
                            $eytrow = mysqli_fetch_assoc($eytresult);
                            
                    ?>
                <h4 style="padding: 10px 0;">Total Expenditure</h4>
                    <h1><?php echo $eytrow['SUM(amount)']; ?></h1>
                    <?php 
                    }?>
                </div>
                
            </div>
    </div>
</div>

</div>

<?php include "footer.php";?>