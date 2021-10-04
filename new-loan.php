<style>
    .image{

        display:flex; 
    }
    img{

        height:50px;
        weight:50px;

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
        <h1 style="color: White;padding:15px 0 0 0;">Add New Loan</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->
<!---------- jscipt --------->
<?php  
    include "config.php";
    $value2='';
    //Query to fetch last inserted invoice number
    $sql = "SELECT voucher_no from loan order by voucher_no DESC LIMIT 1";
    $result = mysqli_query($conn, $sql) or die(print_r($sql));
    if(mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            $value2 = $row['voucher_no'];
         $value2 = substr($value2, 4, 7);//separating numeric part
            $value2 = $value2 + 1;//Incrementing numeric part
           $value2 = "Bx3/" . sprintf('%03s', $value2);//concatenating incremented value
            $value = $value2; 
        }
    } 
    else {
        $value2 = "Bx3/001";
        $value = $value2;
    }
   
    ?>



<div style="width: 650px;margin-left:310px; margin-top:70px; border-radius:20px; background-color:#A3E4D7;text-align: -webkit-center;">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" style="margin:20px 30px; padding:20px 30px; text-align: -webkit-center;">
        <div class="image" >
           <img src="imgs/istt-logo.png">
           <h3 style="color:#A93226 ;margin-top: 15px; margin-left: 10px;">INSTITUTE OF SCIENCE TRADE & TECHNOLOGY</br></h3>

            
        </div>
        <div>
            <h3 style="color:#EC7063">Loan Receipt</h3>
        </div>
        <br>
        <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>Provided To :
            <input type="text" name="provided_to" class="addinput" style="width:120px;">
            </h3>
        </div>

        <div>
            <h3>Designation :
            <input type="text" name="designation" class="addinput" style="width:120px;">
            </h3>
        </div>
        </div>
        <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>
                Purpose : <input type="text" name="purpose" class="addinput" style="width:120px;margin-left: 33px;"></h3> 
            
        </div>
        <div>
            <h3>
                Amount :  <input type="text" name="amount" class="addinput" style="width:120px;"></h3>
            
        </div>
    </div>
    <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>Provided By :
            <input type="text" name="provided_by" class="addinput" style="width:120px;"></h3>
            
        </div>
         <div>
            <h3>
                Loan Status: <input type="text" name="loan_status" value ="Unpaid" class="addinput" style="width:120px;">
            </h3>
        </div>
        
    </div>
    <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>
                Voucher number : <input type="text" name="voucher_no" value ="<?php  echo $value;?>" class="addinput" style="width:83px;">
            </h3>
        </div>
        <div>
            <h3>Date : <input type="text" name="date" value="<?php echo date("d M,Y")?>" class="addinput" style="width:120px;" disabled></h3>
        </div>
       
    </div>
        
        
        
       
        
        
        
        <br>
        <input type="submit" name="submit" value="SAVE" class="logbtn" onclick="window.print()">
    </form>
</div>
<?php 
    include "config.php";
    if(isset($_POST['submit'])){
        $loan_status =mysqli_real_escape_string($conn ,$_POST['loan_status']);
        $voucher_no=mysqli_real_escape_string($conn,$_POST['voucher_no']);
        $provided_by = mysqli_real_escape_string($conn, $_POST['provided_by']);
        $provided_to = mysqli_real_escape_string($conn, $_POST['provided_to']);
        $date = date("d M,Y");
        $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);



        $sql = "INSERT INTO loan(loan_status,voucher_no,date, purpose, amount, provided_by, provided_to, designation)
                VALUES('{$loan_status}','{$voucher_no}','{$date}', '{$purpose}', '{$amount}', '{$provided_by}', '{$provided_to}', '{$designation}')";
        $result = mysqli_query($conn, $sql);
        if($result){
            ?><script>
                location.replace("loan.php");
            </script><?php
        }
    }

?>