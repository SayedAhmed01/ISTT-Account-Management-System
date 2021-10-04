<?php 
include "config.php";
session_start();
if(!isset($_SESSION['username'])){
    header("location:index.php");
}

    include "config.php";

    if(isset($_FILES['photo'])){
        
        $errors = array();
        
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $file_ext = end(explode('.', $file_name));
        
        if($file_size > 10485760){
            $errors[] = "File size must be 10mb or lower";

        }
        $new_name =  time(). "-".basename($file_name);
        $target = "upload/".$new_name;

        if(empty($errors) == true){
            move_uploaded_file($file_tmp,$target);

        }else{
            print_r($errors);
            die();
        }
    }

    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $session = mysqli_real_escape_string($conn, $_POST['session']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $religion = mysqli_real_escape_string($conn, $_POST['religion']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $raddress = mysqli_real_escape_string($conn, $_POST['raddress']);
    $paddress = mysqli_real_escape_string($conn, $_POST['paddress']);
    $sscinstname = mysqli_real_escape_string($conn, $_POST['sscinstname']);
    $sscpyear = mysqli_real_escape_string($conn, $_POST['sscpyear']);
    $sscgroup = mysqli_real_escape_string($conn, $_POST['sscgroup']);
    $sscboard = mysqli_real_escape_string($conn, $_POST['sscboard']);
    $sscgpa = mysqli_real_escape_string($conn, $_POST['sscgpa']);
    $hscinstname = mysqli_real_escape_string($conn, $_POST['hscinstname']);
    $hscpyear = mysqli_real_escape_string($conn, $_POST['hscpyear']);
    $hscgroup = mysqli_real_escape_string($conn, $_POST['hscgroup']);
    $hscboard = mysqli_real_escape_string($conn, $_POST['hscboard']);
    $hscgpa = mysqli_real_escape_string($conn, $_POST['hscgpa']);
    $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
    $total_fee = mysqli_real_escape_string($conn, $_POST['total_fee']);
    $admission_fee = mysqli_real_escape_string($conn, $_POST['admission_fee']);
    $ps_fee = mysqli_real_escape_string($conn, $_POST['ps_fee']);
    $mt_fee = mysqli_real_escape_string($conn, $_POST['mt_fee']);
    $ccredit = mysqli_real_escape_string($conn, $_POST['ccredit']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);


    $sql = "INSERT INTO student(student_id, fullname, fname, mname, dob, session_name, gender, religion, photo, phone, email, nationality, raddress, paddress, sscinstname, sscpyear, sscgroup, sscboard, sscgpa, hscinstname, hscpyear, hscgroup, hscboard, hscgpa, course_name, total_fee, admission_fee, ps_fee, mt_fee, ccredit)
            VALUES('{$student_id}', '{$fullname}', '{$fname}', '{$mname}', '{$dob}', '{$session}', '{$gender}', '{$religion}', '{$new_name}', '{$phone}', '{$email}', '{$nationality}', '{$raddress}', '{$paddress}', '{$sscinstname}', '{$sscpyear}', '{$sscgroup}', '{$sscboard}', '{$sscgpa}', '{$hscinstname}', '{$hscpyear}', '{$hscgroup}', '{$hscboard}', '{$hscgpa}', '{$course_name}', '{$total_fee}', '{$admission_fee}', '{$ps_fee}', '{$mt_fee}', '{$ccredit}')";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if($result){
        header("location:dashboard.php");
    }else{
        echo print_r($sql);
    }
?>