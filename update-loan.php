
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
<!---------- php --------->
<?php
$lid =$_GET['lid'];
$sql1 ="SELECT * FROM loan WHERE lid='{$lid}'";
$result1 = mysqli_query($conn, $sql1) or die(print_r($sql1));
while ($row=mysqli_fetch_array($result1)) {
    $date=$row['date'];
    $purpose=$row['purpose'];
    $amount=$row['amount'];
    $provided_by=$row['provided_by'];
    
    $provided_to=$row['provided_to'];
    $designation=$row['designation'];
 $voucher_no=$row['voucher_no'];
 $loan_status=$row['loan_status'];
}

?>
<?php
if(isset($_POST['update']))
{

 $date=$_POST['date'];
    $purpose=$_POST['purpose'];
    $voucher_no=$_POST['voucher_no'];
    $amount=$_POST['amount'];
    
    $provided_by=$_POST['provided_by'];
    $provided_to=$_POST['provided_to'];
    $loan_status=$_POST['loan_status'];  
    $designation=$_POST['designation'];  
   $sql="UPDATE loan SET voucher_no='$voucher_no',date='$date',purpose='$purpose',designation='$designation',loan_status='$loan_status',purpose='$purpose',provided_by='$provided_by',provided_to='$provided_to' WHERE lid='{$lid}'";
   $result = mysqli_query($conn, $sql) or die(print_r($sql));
   if($result){
        header("location:loan.php");
        echo "successfully updated";
    }else{ 
        header("location:loan.php");
    }
   
}

?>

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



<div style="width: 650px;margin-left:310px; margin-top:70px; border-radius:20px; background-color:#F5B7B1   ;text-align: -webkit-center;">
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
            <input type="text" name="provided_to" class="addinput"value= "<?php echo $provided_to ?> " style="width:120px;">
            </h3>
        </div>

        <div>
            <h3>Designation :
            <input type="text" name="designation"value= "<?php echo $designation ?> " class="addinput" style="width:120px;">
            </h3>
        </div>
        </div>
        <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>
                Purpose : <input type="text" name="purpose"value= "<?php echo  $purpose ?> " class="addinput" style="width:120px;margin-left: 33px;"></h3> 
            
        </div>
        <div>
            <h3>
                Amount :  <input type="text" name="amount"value= "<?php echo  $amount ?> " class="addinput" style="width:120px;"></h3>
            
        </div>
    </div>
    <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>Provided By :
            <input type="text" name="provided_by"value= "<?php echo $provided_by ?> " class="addinput" style="width:120px;"></h3>
            
        </div>
         <div>
            <h3>
                Loan Status: <input type="text" name="loan_status" value= "<?php echo $loan_status?> " class="addinput" style="width:120px;">
            </h3>
        </div>
        
    </div>
    <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>
                Voucher number : <input type="text" name="voucher_no" value= "<?php echo $voucher_no?> " class="addinput" style="width:83px;">
            </h3>
        </div>

        
        <div>
            <h3>Date : <input type="text" name="date" value="<?php echo date("d M,Y")?>" class="addinput" style="width:120px;"></h3>
        </div>
       
    </div>
        
        
        
       
        
        
        
        <br>
        <input type="submit" name="update" value="Update" class="logbtn">
    </form>
</div>
