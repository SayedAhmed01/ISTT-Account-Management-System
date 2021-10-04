<?php 
    include "config.php";
    if(isset($_POST['submit'])){
    $ses = mysqli_real_escape_string($conn, $_POST['ses']);
    $sesql = "INSERT INTO sessions(session_name) VALUES('{$ses}')";
    $sesresult = mysqli_query($conn, $sesql);
    if($sesresult){
        header("location:session.php");
        }else{
            die("Something went wrong.");
        }
    }
?>
