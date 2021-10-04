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
        <h1 style="color: White;padding:15px 0 0 0;">Students Full Information</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->

<?php 
include "config.php";
    $sid = $_GET['id'];
    $sql = "SELECT * FROM student WHERE sid = {$sid}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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

<!------------ Personal Information -------------->

<div style="display: flex; justify-content:space-evenly;">
    <div>
        <h4>Student's ID</h4>
        <input type="text" name="student_id" class="addinput" value="<?php echo $row['student_id']?>" disabled >
    </div>
    
</div>
        <Div class="headline">
            <h2>
                <u>Personal Information</u>
            </h2>
        </Div>
    <div style="display: flex;justify-content:space-evenly;">
        <div>
            <div>
                <h4>Student's Full Name</h4>
                <input type="text" name="fullname" class="addinput" value="<?php echo $row['fullname']?>"disabled required>
            </div>
            <div>
                <h4>Father Name</h4>
                <input type="text" name="fname" class="addinput" value="<?php echo $row['fname']?>"disabled required>
            </div>
            <div>
                <h4>Mother Name</h4>
                <input type="text" name="mname" class="addinput" value="<?php echo $row['mname']?>"disabled required>
            </div>
            <div>
                <h4>Date Of Birth</h4>
                <input type="date" name="dob" class="addinput" value="<?php echo $row['dob']?>"disabled required>
            </div>
            <div>
                    <h4>Program Name</h4>
                    <input type="text" name="course_name" class="addinput" value="<?php echo $row['course_name']?>"disabled required>
                </div>
            <div>
                <h4>Session</h4>
                <input type="text" name="session_name" class="addinput" value="<?php echo $row['session_name']?>"disabled>
            
                </Select>
            </div>
            <div>
                <h4>Gender</h4>
                <input type="text" name="gender" class="addinput" value="<?php echo $row['gender']?>"disabled>

                </Select>
            </div>
            <div>
                <h4>Religion</h4>
                <input type="text" name="religion" class="addinput" value="<?php echo $row['religion']?>"disabled  required>
            </div>
        </div>
        <div>
            <div>
                <h4>Student's Photo</h4>
                <img src="upload/<?php echo $row['photo']?>" style="height: 100px; width:100px;"disabled >
            </div>
            
            <div>
                <h4>Phone Number</h4>
                <input type="text" name="phone" class="addinput" value="<?php echo $row['phone']?>" required>
            </div>
            <div>
                <h4>Email Address</h4>
                <input type="email" name="email" class="addinput" value="<?php echo $row['email']?>"disabled>
            </div>
            <div>
                <h4>Nationality</h4>
                <input type="text" name="nationality" class="addinput" value="<?php echo $row['nationality']?>"disabled  required>
            </div>
            <div>
                <h4>Present Address</h4>
                <textarea name="raddress" id="raddress" cols="35" rows="4" autocomplete="off"><?php echo $row['raddress']?></textarea>
            </div>
            <div>
                <h4>Parmanent Address</h4>
                <textarea name="paddress" id="paddress" cols="35" rows="4" autocomplete="off"><?php echo $row['paddress']?></textarea>
            </div>
        </div>
    </div>




    


<!--------- Academic Information ------------>


        <Div class="headline">
            <h2>
                <u>Academic Information</u>
            </h2>
        </Div>
        <div style="display: flex; justify-content:space-evenly">

            <!--------- S.S.C ------------>

            <div>
                <Div class="headline1">
                    <h3>
                        <u>S.S.C / Equivalant</u>
                    </h3>
                </Div>
                <div>
                    <div>
                        <h4>Institution Name</h4>
                        <input type="text" name="sscinstname" class="addinput" value="<?php echo $row['sscinstname']?>"disabled >
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="sscpyear" class="addinput" value="<?php echo $row['sscpyear']?>"disabled  required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="sscgroup" class="addinput" value="<?php echo $row['sscgroup']?>"disabled  required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="sscboard" class="addinput" value="<?php echo $row['sscboard']?>"disabled >
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="sscgpa" class="addinput" value="<?php echo $row['sscgpa']?>"disabled >
                    </div>
                </div>
            </div>

            <!--------- H.S.C ------------>



            <div>
                <Div class="headline1">
                    <h3>
                        <u>H.S.C / Equivalant</u>
                    </h3>
                </Div>
                <div>
                    <div>
                        <h4>Institution Name</h4>
                        <input type="text" name="hscinstname" class="addinput" value="<?php echo $row['hscinstname']?>"disabled >
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="hscpyear" class="addinput" value="<?php echo $row['hscpyear']?>"disabled  required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="hscgroup" class="addinput" value="<?php echo $row['hscgroup']?>"disabled  required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="hscboard" class="addinput" value="<?php echo $row['hscboard']?>"disabled >
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="hscgpa" class="addinput" value="<?php echo $row['hscgpa']?>"disabled >
                    </div>
                </div>
            </div>
    </div>

<!--------- Course Related Information ------------>
    <div>
        <Div class="headline">
            <h2>
                <u>Fees Related Information</u>
            </h2>
        </Div>
        <div style="display: flex;justify-content:space-evenly">
            <div>
                <div>
                    <h4>Admission Fee</h4>
                    <input type="text" name="admission_fee" class="addinput" value="<?php echo $row['admission_fee']?>"disabled  required>
                </div>
                                <div>
                    <h4>Monthly Tution Fee</h4>
                    <input type="text" name="mt_fee" class="addinput" value="<?php echo $row['mt_fee']?>" disabled required>
                </div>
                
                <div>
                    <h4>Total Course Fee</h4>
                    <input type="text" name="total_fee" class="addinput" value="<?php echo $row['total_fee']?>"disabled required>
                </div>
                
                
            </div>
            <div>
            <div>
                    <h4>Per semester Fee</h4>
                    <input type="text" name="ps_fee" class="addinput" value="<?php echo $row['ps_fee']?>"disabled  required>
                </div>

            
                <div>
                    <h4>Course Credit</h4>
                    <input type="text" name="ccredit" class="addinput" value="<?php echo $row['ccredit']?>"disabled >
                </div>
                
            </div>
        </div>
    </div>
    



<?php include "footer.php";?>