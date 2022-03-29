<?php

session_start(); 
include "../db_conn.php";

$examname =  $_GET['exname'] ;
$_SESSION['examname'] =  $_GET['exname'] ;

//echo $examname." <br>";

$sql = "SELECT exam_id FROM  exam WHERE exam_name = '$examname'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);  
$examid =  $row['exam_id'] ; 
$_SESSION['examid'] = $row['exam_id'] ; 

//echo $examid." <br>";

$sqlsta = "SELECT exam_status.status FROM  exam_status WHERE exam_id = '$examid'";
$resultsta = mysqli_query($conn, $sqlsta);
$rowsta  = mysqli_fetch_assoc($resultsta);  

//echo $rowsta['status'];

if ( $rowsta['status'] == "Draft") {
    header("Location: ../teacher_single_exam.php");
}
elseif( $rowsta['status'] == "Published"){
    header("Location: ../teacher_monitor_started_exam.php");
}else{
    header("Location: ../teacher_exam.php");
}
   
?>