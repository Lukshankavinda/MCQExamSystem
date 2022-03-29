<?php

session_start(); 
include "../db_conn.php";

$examname =  $_GET['exname'] ;
$_SESSION['examname'] =  $_GET['exname'] ;

$sql = "SELECT exam_id FROM  exam WHERE exam_name = '$examname'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);  
$examid =  $row['exam_id'] ; 
$_SESSION['examid'] = $row['exam_id'] ; 

$sqlsta = "SELECT exam_student_status.status FROM  exam_student_status WHERE exam_id = '$examid'";
$resultsta = mysqli_query($conn, $sqlsta);
$rowsta  = mysqli_fetch_assoc($resultsta);  

if ( $rowsta['status'] == "Pending") {
    header("Location: ../student_single_exam.php");
}
elseif( $rowsta['status'] == "Published"){
    header("Location: ../student_exam_results.php");
}else{
    header("Location: ../student_exam.php");
}
   
?>