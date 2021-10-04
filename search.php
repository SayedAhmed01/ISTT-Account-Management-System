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
        <h1 style="color: White;padding:15px 0 0 0;">Students List</h1>
    </div>
    <div>
        <a href="dashboard.php"><h3 style="color: White;padding:10px 10px 0 0;">HOME</h3></a>

        <a href="logout.php"><h4 style="color: White;padding:10px 10px 0 0;">Logout</h4></a>
    </div>
</div>



<div>
        <div>
            <form action="search.php" method="GET">
                <div style="text-align: center; border-radius:20px;">
                <h3 style="padding-top:20px;">Search Student</h3>
                <input type="text" name="search" class="addinput" style="margin:20px 20px" placeholder="Enter Students ID Number" required>
                <input type="submit" name="submit" value="Search" class="logbtn">
                </div>
            </form>
        </div>
    </div>

                <?php
                    include "config.php";
                    $search = $_GET['search'];
$sql = "SELECT * FROM student WHERE student_id LIKE '%{$search}%'";
                        $result = mysqli_query($conn, $sql) or die(print_r($sql));
                            if(mysqli_num_rows($result) > 0){
                                
                  ?>
                  

                  <div style="text-align: -webkit-center;">
                  <table class="content-table">
                      <thead>
                         
                          <th>Student Id</th>
                          <th>Full Name</th>
                          <th>Father Name</th>
                          <th>Mother Name</th>
                          <th>Phone</th>
                          <th>Photo</th>
                          
                      </thead>
                      <tbody>
                      <?php
                       while($row = mysqli_fetch_assoc($result)){ ?>
                          <tr>
                             
                              <td><?php  echo $row['student_id'];?></td>
                              <td><a href="individual-student.php?id=<?php  echo $row['sid'];?>"><?php  echo $row['fullname'];?></a></td>
                              <td><?php  echo $row['fname'];?></td>
                              <td><?php  echo $row['mname'];?></td>
                              <td><?php  echo $row['phone'];?></td>
                              <td><img src="upload/<?php  echo $row['photo'];?>" style="height:50px;width:50px;"></td>

                              

                          </tr>
                          <?php } ?>
                      </tbody>
                  </table>
                  </div>
                  <?php
                    }else{
                        echo "<div style='text-align:center;'><h3>No students has registered with this ID</h3><div>";
                    }
                    ?>



<?php include "footer.php";?>