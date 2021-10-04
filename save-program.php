<?php 
    include "config.php";
    if(isset($_POST['submit'])){
    $ses = mysqli_real_escape_string($conn, $_POST['pog']);
    $sesql = "INSERT INTO course(course_name) VALUES('{$ses}')";
    $sesresult = mysqli_query($conn, $sesql);
    if($sesresult){
        header("location:program.php");
        }else{
            die("Something went wrong.");
        }
    }
?>
