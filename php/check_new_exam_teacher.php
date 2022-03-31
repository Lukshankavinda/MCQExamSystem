<?php
session_start();
include "../db_conn.php";

$id = $_SESSION['teacher_id'];
$ename = $_POST['new_exam_name'];
$edate = $_POST['new_exam_date'];
$etime = $_POST['new_exam_duration'];

$date =  date('y-m-d h:i:s');


$sqla = "INSERT INTO exam (exam_id , exam_name, exam_start, exam_duration) 
    	 VALUES (null, '$ename', '$edate', '$etime')";
mysqli_query($conn, $sqla);

$sqlb = "SELECT exam_id FROM exam WHERE exam_name ='$ename' ";
$resultb = mysqli_query($conn, $sqlb);
$rowb  = mysqli_fetch_assoc($resultb);
$eid =   $rowb['exam_id'];

$sqlc = "INSERT INTO exam_status(exam_id, teacher_id, last_update, exam_status.status) 
    	 VALUES ($eid, '$id', '$date ', 'Draft')";
mysqli_query($conn, $sqlc);

$_SESSION['examname'] = $ename;
header("Location: ../teacher_single_exam.php?examid=$eid ");
?>