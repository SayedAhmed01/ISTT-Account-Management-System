 <script src="myscripts.js"></script>
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
        <h1 style="color: White;padding:15px 0 0 0;">New Student Admission</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->
<script>
    function multiplyBy()
{      var num4=parseInt(8);
        var num5=parseInt(48);
        var num1 =parseInt(document.getElementById("firstNumber").value);
        var num2 = parseInt(document.getElementById("secondNumber").value);
        var num3 = parseInt(document.getElementById("thirdNumber").value);
        document.getElementById("result").innerHTML = num1 + num3*num5 +num2*num4;
}
</script>

<form action="save-newadd.php" method="POST" enctype="multipart/form-data">

<!------------ Personal Information -------------->


        <div class="headline">
            <h2>
                <u>Personal Information</u>
            </h2>
        </Div>
    <div style="display: flex;justify-content:space-evenly;">
        <div>
            <div>
                <h4>Student's Full Name</h4>
                <input type="text" name="fullname" class="addinput" required>
            </div>
            <div>
                <h4>Father Name</h4>
                <input type="text" name="fname" class="addinput" required>
            </div>
            <div>
                <h4>Mother Name</h4>
                <input type="text" name="mname" class="addinput" required>
            </div>
            <div>
                <h4>Date Of Birth</h4>
                <input type="date" name="dob" class="addinput" required>
            </div>
            <div>
                    <h4>Program Name</h4>
                    
                     <Select class="addinput" name="course_name" required>
                    <option value="select session" disabled selected>Please Select</option>
                    <?php 
                    include "config.php";
                    $sql = "SELECT * FROM course";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                
                ?>
                            <option><?php echo $row['course_name']?></option>
                <?php       
                        }
                    }
                ?>
            
                </Select>

                </div>
            <div>
                <h4>Session</h4>
                <Select class="addinput" name="session" required>
                    <option value="select session" disabled selected>Please Select</option>
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
                <Select class="addinput" name="gender" required>
                    <option value="select session" disabled selected>Please Select</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                    <option value="other">Other</option>

                </Select>
            </div>
            <div>
                <h4>Religion</h4>
                <input type="text" name="religion" class="addinput" required>
            </div>
        </div>
        <div>
            <div>
                    <h4>Student ID</h4>
                    <input type="text" name="student_id" class="addinput">
                </div>
            <div>
                <h4>Student's Photo</h4>
                <input type="file" accept="image/*" name="photo">
            </div>
            
            <div>
                <h4>Phone Number</h4>
                <input type="text" name="phone" class="addinput" required>
            </div>
            <div>
                <h4>Email Address</h4>
                <input type="email" name="email" class="addinput" autocomplete="off">
            </div>
            <div>
                <h4>Nationality</h4>
                <input type="text" name="nationality" class="addinput" required>
            </div>
            <div>
                <h4>Present Address</h4>
                <textarea name="raddress" id="raddress" cols="35" rows="4" autocomplete="off"></textarea>
            </div>
            <div>
                <h4>Parmanent Address</h4>
                <textarea name="paddress" id="paddress" cols="35" rows="4" autocomplete="off"></textarea>
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
                        <input type="text" name="sscinstname" class="addinput">
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="sscpyear" class="addinput" required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="sscgroup" class="addinput" required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="sscboard" class="addinput">
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="sscgpa" class="addinput">
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
                        <input type="text" name="hscinstname" class="addinput">
                    </div>
                    <div>
                        <h4>Passing Year</h4>
                        <input type="text" name="hscpyear" class="addinput" required>
                    </div>
                    <div>
                        <h4>Group</h4>
                        <input type="text" name="hscgroup" class="addinput" required>
                    </div>
                    <div>
                        <h4>Board</h4>
                        <input type="text" name="hscboard" class="addinput">
                    </div>
                    <div>
                        <h4>GPA / Division</h4>
                        <input type="text" name="hscgpa" class="addinput">
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
                    <input type="text" name="admission_fee" id="firstNumber" class="addinput" required>
                </div>
               <div>
                    <h4>Monthly Tution Fee</h4>
                    <input type="text" name="mt_fee" id="thirdNumber"class="addinput" required>
                </div>
                
                <div>
                    <h4>Total Course Fee</h4>

                
                <textarea name="total_fee" id="result" cols="34" rows="1"class="addinput" autocomplete="off"style="height: 25px;
    width: 250px;text-align:center; border-radius: 10px;"></textarea>

            
                </div>
                <div>
                <input type="button"  class="logbtn1" onClick="multiplyBy()" Value="Calculate" style="margin: 17px 0";/>
                </div>
               
                
            </div>
            <div>
            <div>
                    <h4>Semester Fee</h4>
                    <input type="text" name="ps_fee"id="secondNumber" class="addinput" required>
                </div>
                <div>
                    <h4>Course Credit</h4>
                    <input type="text" name="ccredit" class="addinput">
                </div>
                
             
                
                
            </div>
        </div>
    </div>
    <div style="text-align: center;">
    <input type="submit" value="SAVE" class="logbtn" style="margin: 20px 0;">

    </div>
</form>


<?php include "footer.php";?>