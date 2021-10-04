<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include "header.php";?>
<style>
    .expense{
        width: 650px;
        margin-left:310px; 
        border-radius:20px; 
        margin-top:70px;
        background-color: #82E0AA;
    }
    @media print{
        .topbar{
            display: none;
        }
        .logbtn{
            display: none;
        }
        .expense{
            margin-left:120px;
        }
    }
    .image{

        display:flex; 
    }
    img{

        height:50px;
        weight:50px;

    }
</style>
<!---------- Topbar --------->
<div class="topbar">
    <div class="topwrap">
        <img src="imgs/istt-logo.png"> 

        <h1 style="color: white;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Add New Expenditure</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->\
<!---------- jscript for auto voucher no --------->

<?php  
    include "config.php";
    $value2='';
    //Query to fetch last inserted invoice number
    $sql = "SELECT voucher_number from expenditure order by voucher_number DESC LIMIT 1";
    $result = mysqli_query($conn, $sql) or die(print_r($sql));
    if(mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            $value2 = $row['voucher_number'];
         $value2 = substr($value2, 4, 7);//separating numeric part
            $value2 = $value2 + 1;//Incrementing numeric part
           $value2 = "ABW/" . sprintf('%03s', $value2);//concatenating incremented value
            $value = $value2; 
        }
    } 
    else {
        $value2 = "ABW/001";
        $value = $value2;
    }
   
    ?>


<div class="expense">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" style="margin:20px 30px; padding:20px 30px;">
        <div class="image" >
           <img src="imgs/istt-logo.png">
           <h3 style="color:#A93226 ;margin-top: 15px; margin-left: 10px;">INSTITUTE OF SCIENCE TRADE & TECHNOLOGY</br></h3>

            
        </div>

        <div>
        </div>

        <div style="text-align: center;">

            <h3  style="color:#11532D">Expense Receipt</h3>
        </div>
        <br>
        <div style="display: flex;justify-content:space-between;">

            <h3>
                Name: <input type="text" name="name" class="addinput"style="width:123px;" required>
            </h3>
            <h3>
                Designation: <input type="text" name="designation" class="addinput"style="width:110px;" required>
            </h3>
</div>
<div style="display: flex;justify-content:space-between;">
        <div>
            <h3>
                Purpose: <input type="text" name="purpose" class="addinput"style="width:100px;" required>
            </h3>
        </div>
        
        <div>
            <h3>
                Amount : <input type="text" name="amount" class="addinput" style="width:110px;" required>
            </h3>
        </div>
    </div>
        <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>Voucher No: <input type="text" name="voucher_number"value ="<?php  echo $value;?>" class="addinput" style="width:70px;" required></h3>
        </div>
        <div>
            <h3>Date: <input type="text" value="<?php echo date("d M,Y");?>" name="date" class="addinput" style="width:110px; margin-top: 7px;"disabled required> 
                </h3>
        </div>
        </div>


        <br>
        <input type="submit" name="submit" value="SAVE" class="logbtn" style="width:100px;margin-left:40%;" onclick="window.print()">
    </form>
</div>
<?php 
    include "config.php";
    if(isset($_POST['submit'])){
        $voucher_number = mysqli_real_escape_string($conn, $_POST['voucher_number']);
        $date = date("d M,Y");
        $date_day = date("d");
        $date_month = date("M");
        $date_year = date("Y");
        $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);


        $sql = "INSERT INTO expenditure(voucher_number, date, date_day, date_month, date_year, name, designation, purpose, amount)
                VALUES('{$voucher_number}', '{$date}', '{$date_day}', '{$date_month}', '{$date_year}', '{$name}', '{$designation}', '{$purpose}', '{$amount}')";
        $result = mysqli_query($conn, $sql);
        if($result){
            ?><script>
                location.replace("expenditure.php")
            </script><?php
        }
    }

?>