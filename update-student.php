<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include "header.php";

?>
<div class="topbar">
    <div class="topwrap">
        <img src="imgs/istt-logo.png">
        <h1 style="color: White;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Update Student</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>

<?php
$id =$_GET['id'];
$sql ="SELECT * FROM student WHERE sid='{$id}'";
$result = mysqli_query($conn, $sql) or die(print_r($sql));
while ($row=mysqli_fetch_array($result)) {
    $name=$row['fullname'];
    
    $fname=$row['fname'];
    $mname=$row['mname'];
    $dob=$row['dob'];
    $session=$row['session_name'];
    $gender=$row['gender'];
    $religion=$row['religion'];
     $photo=$row['photo'];
     $phone=$row['phone'];
     $email=$row['email'];
     $nationality=$row['nationality'];
     $raddress=$row['raddress'];
     $paddress=$row['paddress'];
     $sscinstname=$row['sscinstname'];
     $sscpyear=$row['sscpyear'];
     $sscgroup=$row['sscgroup'];
     $sscboard=$row['sscboard'];
     $sscgpa=$row['sscgpa'];
     $hscinstname=$row['hscinstname'];
     $hscpyear=$row['hscpyear'];
     $hscgroup=$row['hscgroup'];
     $hscboard=$row['hscboard'];
     $hscgpa=$row['hscgpa'];
      $course_name=$row['course_name'];
     $total_fee=$row['total_fee'];
     $admission_fee=$row['admission_fee'];
     $ps_fee=$row['ps_fee'];
     $mt_fee=$row['mt_fee'];
      $ccredit=$row['ccredit'];
   
    


}
?>
<?php

if(isset($_POST['Update']))
{
$name=$_POST['fullname'];
    $fname=$_POST['fname'];
   $mname=$_POST['mname'];
   $dob =$_POST['dob'];
   $session=$_POST['session']; 
    $gender=$_POST['gender'];
    $religion=$_POST['religion'];
    $photo=$_POST['photo'];
    $phone=$_POST['phone'];
     $email=$_POST['email'];
     $nationality=$_POST['nationality'];
     $raddress=$_POST['raddress'];
     $paddress=$_POST['paddress'];
     $sscinstname=$_POST['sscinstname'];
     $sscpyear=$_POST['sscpyear'];
     $sscgroup=$_POST['sscgroup'];
     $sscboard=$_POST['sscboard'];
     $sscgpa=$_POST['sscgpa'];
     $hscinstname=$_POST['hscinstname'];
     $hscpyear=$_POST['hscpyear'];
     $hscgroup=$_POST['hscgroup'];
     $hscboard=$_POST['hscboard'];
     $hscgpa=$_POST['hscgpa'];
     $course_name=$_POST['course_name'];
     $total_fee=$_POST['total_fee'];
     $admission_fee=$_POST['admission_fee'];
     $ps_fee=$_POST['ps_fee'];
     $mt_fee=$_POST['mt_fee'];
      $ccredit=$_POST['ccredit'];
     


   $sql="UPDATE student SET fullname='$name',fname='$fname',mname='$mname',dob='$dob',session_name	='$session',gender='$gender',religion='$religion',photo='$photo',phone='$phone',email='$email',nationality='$nationality',raddress='$raddress',paddress= '$paddress',sscinstname='$sscinstname',sscpyear='$sscpyear',sscgroup='$sscgroup',sscboard='$sscboard',sscgpa='$sscgpa',hscinstname='$hscinstname',hscpyear='$hscpyear',hscgroup='$hscgroup',hscboard='$hscboard',hscgpa='$hscgpa',course_name='$course_name',total_fee='$total_fee',ps_fee='$ps_fee',mt_fee=' $mt_fee',ccredit='$ccredit'WHERE sid='{$id}'";
   $result = mysqli_query($conn, $sql) or die(print_r($sql));
    
   if($result){

    echo "Student Update Successfully";
   }
   else
   {

    echo "Student Not Update";
   }
   

}

   


?>
<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" style="margin:20px 30px; padding:20px 30px;">
          <Div class="headline">
            <h2>
                <u>Personal Information</u>
            </h2>
        </Div>
    <div style="display: flex;justify-content:space-evenly;">
        <div>
            <div>
                <h4>Student's full Name</h4>
                <input type="text" name="fullname" value= "<?php echo $name ?> " class="addinput" required>
            </div>
            <div>
                <h4>Father Name</h4>
                <input type="text" name="fname" value= "<?php echo $fname ?> " class="addinput" required>
            </div>
            <div>
                <h4>Mother Name</h4>
                <input type="text" name="mname" value= "<?php echo $mname ?> "class="addinput" required>
            </div>
            <div>
                <h4>Date Of Birth</h4>
                <input type="birthday" id="myDate" name="dob" value= "<?php echo $dob ?> "class="addinput" required>
            </div>
            <div>
                <h4>Session</h4>
                <Select class="addinput" name="session"value= "<?php echo $session?>  required>
                    <option value="select session" >Please Select</option>
                    <?php 
                    include "config.php";
                    $sql = "SELECT * FROM sessions";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                
                ?>
                            <option><?php echo $row['session_name']?></option>
                <?php       
                        }
                    }
                ?>
            
                </Select>
            </div>
            <div>
                <h4>Gender</h4>
                <Select class="addinput" name="gender"value= "<?php echo $gender?>  required>
                    <option value="select session" >Please Select</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="other">Other</option>

                </Select>
            </div>
            <div>
                <h4>Religion</h4>
                <input type="text" name="religion" value= "<?php echo $religion?>" class="addinput" required>
            </div>
        </div>
        <div>
            
            
            <div>
                <h4>Phone Number</h4>
                <input type="text" name="phone"value= "<?php echo $phone?>"class="addinput" required>
            </div>
            <div>
                <h4>Email Address</h4>
                <input type="email" name="email" value= "<?php echo $email?>"class="addinput" autocomplete="off">
            </div>
            <div>
                <h4>Nationality</h4>
                <input type="text" name="nationality"value= "<?php echo $nationality?>" class="addinput" required>
            </div>
            <div>
                <h4>Present Address</h4>
                <textarea name="raddress" id="raddress" value= "<?php echo $raddress?>" cols="35" rows="4" autocomplete="off"></textarea>
            </div>
            <div>
                <h4>Parmanent Address</h4>
                <textarea name="paddress" id="paddress" value= "<?php echo $paddress?>" cols="35" rows="4" autocomplete="off"></textarea>
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
                        <input type="text" name="sscinstname"value= "<?php echo $sscinstname?>" class="addinput">
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="sscpyear" value= "<?php echo $sscpyear?>"class="addinput" required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="sscgroup"value= "<?php echo $sscgroup?>" class="addinput" required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="sscboard"value= "<?php echo $sscboard?>" class="addinput">
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="sscgpa"value= "<?php echo $sscgpa?>" class="addinput">
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
                        <input type="text" name="hscinstname"value= "<?php echo $hscinstname?>" class="addinput">
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="hscpyear"value= "<?php echo $hscpyear?>" class="addinput" required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="hscgroup"value= "<?php echo $hscgroup?>" class="addinput" required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="hscboard" value= "<?php echo $hscboard?>"class="addinput">
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="hscgpa" value= "<?php echo $hscgpa?> "class="addinput">
                    </div>
                </div>
            </div>
    </div>

<!--------- Course Related Information ------------>
    <div>
        <Div class="headline">
            <h2>
                <u>Course Related Information</u>
            </h2>
        </Div>
        <div style="display: flex;justify-content:space-evenly">
            <div>
                <div>
                    <h4>Course Name</h4>
                    <input type="text" name="course_name" class="addinput" value= "<?php echo $course_name?> " required>
                </div>
                <div>
                   
                    <input type="hidden" name="student_id" value= "<?php echo $student_id?> " class="addinput">
                </div>
                <div>
                    <h4>Total Course Fee</h4>
                    <input type="text" name="total_fee" value= "<?php echo $total_fee?> " class="addinput" required>
                </div>
                <div>
                    <h4>Admission Fee</h4>
                    <input type="text" name="admission_fee"  value= "<?php echo $admission_fee?> "class="addinput" required>
                </div>
                
            </div>
            <div>
            <div>
                    <h4>Per semester Fee</h4>
                    <input type="text" name="ps_fee" value= "<?php echo $ps_fee?> " class="addinput" required>
                </div>
                <div>
                    <h4>Monthly Tution Fee</h4>
                    <input type="text" name="mt_fee" value= "<?php echo $mt_fee?> " class="addinput" required>
                </div>
            
                <div>
                    <h4>Course Credit</h4>
                    <input type="text" name="ccredit" value= "<?php echo $ccredit?> " class="addinput">
                </div>
                
            </div>
        </div>
    </div>
    <div style="text-align: center;">
    <input type="submit" name="Update" value="Update" class="logbtn" style="margin: 20px 0;">

    </div>
</form>


<?php include "footer.php";?>