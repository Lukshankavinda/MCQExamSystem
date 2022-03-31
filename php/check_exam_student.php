<?php

session_start(); 
include "../db_conn.php";

$examname =  $_GET['exname'] ;
$studentid = $_GET['studentid'] ;

$_SESSION['examname'] =  $_GET['exname'] ;
$_SESSION['studentid'] =  $_GET['studentid'] ;


$sql = "SELECT exam_id FROM  exam WHERE exam_name = '$examname'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_assoc($result);  
$examid =  $row['exam_id'] ; 
$_SESSION['examid'] = $row['exam_id'] ; 

$sqlsta = "SELECT exam_student_status.status FROM  exam_student_status WHERE exam_id = '$examid' 
           AND student_id = '$studentid' ";
           
$resultsta = mysqli_query($conn, $sqlsta);
$rowsta  = mysqli_fetch_assoc($resultsta);  

if ( $rowsta['status'] === "Pending") {
    header("Location: ../student_single_exam.php");
}
else if( $rowsta['status'] === "Attended"){
    header("Location: ../student_exam_results.php?examid=$examid & studentid=$studentid");

}else{
    header("Location: ../student_exam.php");
}

?>