<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include "header.php";

?>

<?php
$id =$_GET['id'];
$sql ="SELECT * FROM expenditure WHERE exp_id='{$id}'";
$result = mysqli_query($conn, $sql) or die(print_r($sql));
while ($row=mysqli_fetch_array($result)) {
    $date=$row['date'];
    $vu=$row['voucher_number'];
    $nam=$row['name'];
    $des=$row['designation'];
    
    $pur=$row['purpose'];
    $amo=$row['amount'];
}
?>
<?php
if(isset($_POST['Update']))
{

 $date=$_POST['date'];
    $voucher_number=$_POST['voucher_number'];
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    
    $purpose=$_POST['purpose'];
    $amount=$_POST['amount'];  
   $sql="UPDATE expenditure SET voucher_number='$voucher_number',date='$date',name='$name',designation='$designation',purpose='$purpose',amount='$amount' WHERE exp_id='{$id}'";
   $result = mysqli_query($conn, $sql) or die(print_r($sql));
   if($result){
        header("location:expenditure.php");
        echo "successfully updated";
    }else{ 
        header("location:expenditure.php");
    }
   
}

?>

<style>
    .expense{
        width: 650px;
        margin-left:310px; 
        border-radius:20px; 
        margin-top:70px;
        background-color:#D0ECE7 ;
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
        <h1 style="color: White;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Edit Expenditure</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->

<div class="expense">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" style="margin:20px 30px; padding:20px 30px;">
         <div class="image" >
           <img src="imgs/istt-logo.png">
           <h3 style="color:#A93226 ;margin-top: 15px; margin-left: 10px;">INSTITUTE OF SCIENCE TRADE & TECHNOLOGY</br></h3>

            
        </div>
        <div style="text-align: center;">
            <h2>Expense Details</h2>
        </div>
        <br>
         <div style="display: flex;justify-content:space-between;">
            <h3>
                Name: <input type="text" name="name" value= "<?php echo $nam ?> "class="addinput"style="width:123px;" required>
            </h3>
            <h3>
                Designation: <input type="text" name="designation" value= "<?php echo $des?> " class="addinput" style="width:110px;"required>
            </h3>
        </div>
        <div style="display: flex;justify-content:space-between;">
        <div>

            <h3>
                Purpose: <input type="text" name="purpose" value= "<?php echo $pur?> " class="addinput"style="width:100px;" required>
            </h3>
        </div>
         
        <div>
            <h3>
                Amount : <input type="text" name="amount" value= "<?php echo $amo?> " class="addinput" style="width:110px;" required>
            </h3>
             </div>
             </div>
       
        <div style="display: flex;justify-content:space-between;">
        <div>
            <h3>Voucher No: <input type="text" name="voucher_number" value= "<?php echo $vu?> " class="addinput" style="width:70px;" required></h3>
        </div>
        <div>
            <h3>Date : <input type="text" name="date" value="<?php echo $date;?>" class="addinput"  style="width:110px; margin-top: 7px;"></h3>
        </div>
        
          
          <input type="hidden" name="id" value= <?php echo $_GET['id'];?>""  class="addinput"  required>
        
      </div>
        <br>

        <input type="submit" name="Update" value="Update" class="logbtn"style="width:100px;margin-left:40%;">
    </form>
    </div>