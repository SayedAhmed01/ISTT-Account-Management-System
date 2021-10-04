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
        <h1 style="color: White;padding:15px 0 0 0;">LOAN</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>
        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->

<br>

    <div>
        <a href="new-loan.php">
            <div style="background-color:green; border-radius:25px;width:170px; text-align:center;float:right;margin-right:30px;">
                <h4 style="padding:10px;color:white;">+ New Loan</h4> 
            </div>
        </a>
    </div>


    <?php
                    include "config.php";
                        $sql = "SELECT * FROM loan ORDER BY lid DESC";
                        $result = mysqli_query($conn, $sql) or die(print_r($sql));
                            if(mysqli_num_rows($result) > 0){
                                
                  ?>
                  <div style="text-align:center;">
                  <h1 style= "margin-left: 180px;">All Loan Details</h1>
                  </div>

                  <div style="text-align: -webkit-center;">
                  <table class="content-table">
                        <thead>
                            <th>VoucherNo</th>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Amount</th>
                            <th>Provided by</th>
                            <th>Provided to</th>
                            <th>Designation</th>
                            <th>Loan Status</th>
                             <th>Action</th>
                            
                        </thead>
                      <tbody>
                      <?php
                       while($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td><?php  echo $row['voucher_no'];?></td>
                              <td><?php  echo $row['date'];?></td>
                              <td><?php  echo $row['purpose'];?></td>
                              <td><?php  echo $row['amount'];?></td>
                              <td><?php  echo $row['provided_by'];?></td>
                              <td><?php  echo $row['provided_to'];?></td>
                              <td><?php  echo $row['designation'];?></td>
                              <td><?php  echo $row['loan_status'];?></td>
                              <td>
                                  <a href="update-loan.php?lid=<?php echo $row['lid'];?>"><button>edit</button></a>
                              
                              </td>
                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  </div>
                  <?php
                    }
                    ?>

<?php include "footer.php";?>