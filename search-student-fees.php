<?php
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}
include "header.php";?>
<style>
    .fee{
        background-color: #82E0AA; 
        border: 1px solid black;
        border-radius: 25px;
        width:fit-content;
       
    }
    .image{

        display:flex; 
    }
    img{
margin-left:45px;
        height:60px;
        weight:60px;

    }
    .prevhist{
        text-align: -webkit-center;
    }
    #new-fees{
        display: none;
    }
    @media print{
        .topbar{
            display: none;
        }
        .search{
            display: none;
        }
        .logbtn{
            display: none;
        }
        .amount{
            display: none;
        }
        
        .prevhist{
            display: none;
        }
    }
</style>
<!---------- Topbar --------->
<div class="topbar">
    <div class="topwrap">
        <img src="imgs/istt-logo.png">
        <h1 style="color: White;padding:15px 0 0 0;">ISTT</h1>
    </div>
    <div>
        <h1 style="color: White;padding:15px 0 0 0;">Add Fees / Payment</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->
<!---------- javascript --------->
<?php  
    include "config.php";
    $value2='';
    //Query to fetch last inserted invoice number
    $sql = "SELECT voucher_number from fees order by voucher_number DESC LIMIT 1";
    $result = mysqli_query($conn, $sql) or die(print_r($sql));
    if(mysqli_num_rows($result) > 0) {
        if ($row = mysqli_fetch_assoc($result)) {
            $value2 = $row['voucher_number'];
         $value2 = substr($value2, 4, 7);//separating numeric part
            $value2 = $value2 + 1;//Incrementing numeric part
           $value2 = "WBC/" . sprintf('%03s', $value2);//concatenating incremented value
            $value = $value2; 
        }
    } 
    else {
        $value2 = "WBC/001";
        $value = $value2;
    }
   
    ?>

<br><br>
<div style="display: block;">
<div style="text-align: right;margin-right:50px;">
<button id="fee-button" class="logbtn" style="width: 150px;" onclick="myFunction()">+ New Payment</button>

</div>
<script>
    function myFunction() {
        document.getElementById("new-fees").style.display = "block";
        }
</script>
    <div style="text-align: -webkit-center;" class="new-fees" id="new-fees">
                <?php
                        include "config.php";
                        if (isset($_GET['submit'])) {
                            $search = $_GET['search'];
                        $session = $_GET['session'];
                        $program = $_GET['program'];
                        $sql = "SELECT * FROM student WHERE student_id='$search' AND session_name = '$session' AND course_name = '$program' ";
                       

                            $result = mysqli_query($conn, $sql) or die(print_r($sql));
                            if(mysqli_num_rows($result) > 0){
                                $row = mysqli_fetch_assoc($result);
                        
                        
                        }
                    }
                ?>
                
                <br>
                  <div class="fee">
                    <div>
                <form action="" method="POST">
                     <div style="margin-left: 15px;margin-right:30px;">
                        <div class="image" >
                      <img src="imgs/istt-logo.png">
                        <h3 style="color:#A93226 ;margin-top: 15px; margin-left: 15px;">INSTITUTE OF SCIENCE TRADE & TECHNOLOGY</br></h3>

            
        </div>
                  
                        <div>
                            <div style="text-align: center;">
                            <h3 style="color:red;padding: 10px;">Fees / Payment Receipt</h3>

                            </div>
                            
                             <div style="display: flex;justify-content:space-between;">
                                <h4>
                                Student Name : <input type="text" value="<?php  echo $row['fullname'];?>" name="fullname" class="addinput" style="text-align: center;color:black;font-weight:600;width:170px;" disabled>
                            </h4>
                            <h4 style="margin-left:73px;">
                                Student ID : <input type="text" value="<?php  echo $row['student_id'];?>" name="student_id" class="addinput" style="text-align: center;color:black;font-weight:600;width:100px;" disabled>
                            </h4>
                           
                            
                            <br>
                            
                            </div>
                        </div><br>
                        <div>
                            <div style="display: flex;justify-content:space-between;">
                            <h4>
                            Session : <input type="text" value="<?php  echo $row['session_name'];?>" name="sid" class="addinput" style="text-align: center;color:black;font-weight:600;width:220px;" disabled>
                            </h4>
                            <h4 style="padding-left: 20px;">
                                Current semester : <input type="text"class="addinput"   name="current_semester" style="text-align: center;color:black;font-weight:600;width:100px;">
                        </h4>
                            </div><br>
                           <div style="display: flex;justify-content:space-between;">
                            <h4>
                                Payment For : 
                                <select style="width:195px;" name="payment_type" id="payment_type" class="addinput">
                                    <option value="Admission Fee">Admission Fee</option>
                                    <option value="Registration Fee">Registration Fee</option>
                                    <option value="Tution Fee">Tution Fee</option>
                                    <option value="Semester Fee">Semester Fee</option>
                                    <option value="Others">Others</option>
                                </select>
                            </h4>
                            <h4 style="padding-left: 20px;">Amount : 
                                <input type="text" name="amount" class="addinput" style="width:100px;" required>
                            </h4>
                        </div>
                        <br>

                        <div style="display: flex;justify-content:space-between;">
                           
                            <h4>Details : 
                                <input type="text" name="details" class="addinput" style="width:230px;"required>
                            </h4>
                       
                        <br>
                        <div>
                            <h4>Payment Date : <input type="text" name="date" value="<?php echo date('d M,Y')?>" class="addinput" style="width:100px; font-weight:600"></h4>
                        </div>
                         </div>
                        <br>
                       
                      
                        
                        <br><br>

                        <div style="margin-right:30px;display:flex;justify-content:space-between;">
                        <div>
                            <h4>Voucher Number</h4>
                            <input type="text" name="voucher_number"value ="<?php  echo $value;?>" class="addinput" style="width:100px;height:20px;">
                        </div>
                           <div>
                           ----------------------
                            <h5>Student Signature</h5>
                           </div>
                        </div>
                        <br>
                    </div>
                    </div>
                  </div>
                  <br>
                  
                  <div style="text-align:center;">
                    <input type="submit" name="submit" value="Save" style="margin-bottom:
                    20px;" onclick="window.print()" class="logbtn">
                  </div>
                  </form>
              </div>
          </div>
                  
                <?php
                if(isset($_POST['submit'])){
                include "config.php";
                        $voucher_number = mysqli_real_escape_string($conn, $_POST['voucher_number']);
                        $sid = $row['sid'];
                        $student_id = $row['student_id'];
                        $fullname = $row['fullname'];
                        $session_name = $row['session_name'];
                        $current_semester = mysqli_real_escape_string($conn, $_POST['current_semester']);
                        $payment_type = mysqli_real_escape_string($conn, $_POST['payment_type']);
                        $amount = mysqli_real_escape_string($conn, $_POST['amount']);
                        $details = mysqli_real_escape_string($conn, $_POST['details']);
                        $date = date("d M,Y");
                        $date_day = date("d");
                        $date_month = date("M");
                        $date_year = date("Y");
                        

                        $amql = "INSERT INTO fees(voucher_number,sid, student_id, student_name, session_name, current_semester, fee_type, amount, details,  date, date_day, date_month, date_year)
                                VALUES('$voucher_number', $sid, '$student_id','$fullname', '$session_name', '$current_semester', '$payment_type', '$amount', '$details', '$date', '$date_day', '$date_month', '$date_year')";
                        


                        $qresult = mysqli_query($conn, $amql);
                        if($qresult){
                            ?>
                            <script>
                                location.replace(document.URL);
                            </script>
                            <?php
                        }
                    }
                    
                ?>

    </div>
    <div class="prevhist">
                <?php
                    include "config.php";
                    $search = $_GET['search'];
                        $sql1 = "SELECT * FROM fees WHERE student_id = '$search' ORDER BY fees_id DESC";
                        $result1 = mysqli_query($conn, $sql1) or die(print_r($sql1));
                            if(mysqli_num_rows($result1) > 0){
                                
                  ?>
                  <div style="text-align:center;">
                  <h1>Previous Payment History</h1>
                  </div>

                  <div>
                  <table class="content-table">
                        <thead>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>semester</th>
                            <th>Voucher Number</th>
                            <th>Admission Fee</th>
                            <th>Semester Fee</th>
                            <th>Tution Fee</th>
                            <th>Registration Fee</th>
                            <th>Others</th>
                        </thead>
                      <tbody>
                      <?php
                       while($row1 = mysqli_fetch_assoc($result1)){ ?>
                          <tr>
                              <td><?php  echo $row1['date'];?></td>
                              <td><?php  echo $row1['amount'];?></td>
                              <td><?php  echo $row1['current_semester'];?></td>
                              <td><?php  echo $row1['voucher_number'];?></td>
                              <?php 
                                include "config.php";
                                $pay_type = $row1['fee_type'];
                                if($pay_type == "Admission Fee"){
                                    ?>
                                    <td><?php  echo $row1['details'];?></td>
                                <?php
                                }else{
                                    ?>
                                    <td><?php  echo "";?></td>
                                <?php
                                }
                              ?>
                              <?php 
                                include "config.php";
                                $pay_type = $row1['fee_type'];
                                if($pay_type == "Semester Fee"){
                                    ?>
                                    <td><?php  echo $row1['details'];?></td>
                                <?php
                                }else{
                                    ?>
                                    <td><?php  echo "";?></td>
                                <?php
                                }
                              ?>
                              <?php 
                                include "config.php";
                                $pay_type = $row1['fee_type'];
                                if($pay_type == "Tution Fee"){
                                    ?>
                                    <td><?php  echo $row1['details'];?></td>
                                <?php
                                }else{
                                    ?>
                                    <td><?php  echo "";?></td>
                                <?php
                                }
                              ?>
                              <?php 
                                include "config.php";
                                $pay_type = $row1['fee_type'];
                                if($pay_type == "Registration Fee"){
                                    ?>
                                    <td><?php  echo $row1['details'];?></td>
                                <?php
                                }else{
                                    ?>
                                    <td><?php  echo "";?></td>
                                <?php
                                }
                              ?>
                              
                              <?php 
                                include "config.php";
                                $pay_type = $row1['fee_type'];
                                if($pay_type == "Others"){
                                    ?>
                                    <td><?php  echo $row1['details'];?></td>
                                <?php
                                }else{
                                    ?>
                                    <td><?php  echo "";?></td>
                                <?php
                                }
                              ?>

                          </tr>
                          <?php } ?>
                          
                      </tbody>
                  </table>
                  </div>
                  <?php
                    }
                    ?>
    </div>

    <br><br><br>
</div>

<?php include "footer.php";?>