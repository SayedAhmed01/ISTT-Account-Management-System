<?php 
    include "config.php";
    $lid = $_GET['lid'];
    $dql = "SELECT * FROM loan WHERE lid = $lid";


    $dresult = mysqli_query($conn, $dql);
    if ($dresult) {
    	$uql = "UPDATE "
    }
    if($dresult){
        header("location:loan.php");
    }else{ 
        header("location:loan.php");
    }
?>