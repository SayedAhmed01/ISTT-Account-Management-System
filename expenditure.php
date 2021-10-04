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
        <h1 style="color: White;padding:15px 0 0 0;">Expenditure</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>
<!---------- Topbar Ends Here --------->
<br>

    <div>
        <a href="new-expenditure.php">
            <div style="background-color:green; border-radius:25px;width:170px; text-align:center;float:right;margin-right:30px;">
                <h4 style="padding:10px;color:white;">+ New Expenditure</h4> 
            </div>
        </a>
    </div>


    <?php
                    include "config.php";
                        $sql = "SELECT * FROM expenditure ORDER BY exp_id DESC";
                        $result = mysqli_query($conn, $sql) or die(print_r($sql));
                            if(mysqli_num_rows($result) > 0){
                                
                  ?>
                  <div style="text-align:center;">
                  <h1>Expenditure</h1>
                  </div>

                  <div style="text-align: -webkit-center;">
                  <table class="content-table" >
                        <thead>
                            <th>Date</th>
                            <th>Voucher No.</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Purpose</th>
                            <th>Amount</th>
                             <th>Edit/Update</th>
                        </thead>
                      <tbody>
                      <?php
                       while($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                              <td><?php  echo $row['date'];?></td>
                              <td><?php  echo $row['voucher_number'];?></td>
                              <td><?php  echo $row['name'];?></td>
                              <td><?php  echo $row['designation'];?></td>
                              <td><?php  echo $row['purpose'];?></td>
                              <td><?php  echo $row['amount'];?></td>
                              <td><a href="update-expenditure.php?id=<?php echo $row['exp_id'];?>"> <i class="fa fa-edit"></i> <class="btn btn-danger"></a>
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