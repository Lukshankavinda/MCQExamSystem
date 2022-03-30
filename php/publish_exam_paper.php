<?php

session_start();
include "../db_conn.php";

if (!$conn) {
  echo "Connection Failed !";
  exit();
}
$exam_id  =  $_POST["hid_input_exam"];
$exam_name  =  $_POST["hid_input_exam_name"];

if (isset($_POST['exam_date']) && isset($_POST['exam_duration']) ) {

    $edate = $_POST['exam_date'];
    $etime = $_POST['exam_duration'];

    $sqlup = " UPDATE exam SET exam_start = '$edate', exam_duration = '$etime'
               WHERE exam_id = '$exam_id' ";

    mysqli_query($conn, $sqlup);

}

$date = date('y-m-d h:i:s');

$sqlupa = " UPDATE exam_status SET exam_status.status = 'Published', last_update = '$date' 
            WHERE exam_id = '$exam_id' ";

mysqli_query($conn, $sqlupa);

$sqla = "SELECT student_id FROM  student  ORDER BY student_id ASC";
$resulta = mysqli_query($conn, $sqla);
$lengtha= mysqli_num_rows($resulta);

for ($i=0; $i < $lengtha; $i++) { 

    $rowa  = mysqli_fetch_assoc($resulta); 
    $sid = $rowa['student_id'];

    $sqlin = "INSERT INTO exam_student_status (exam_id, student_id, exam_student_status.status) 
    VALUES ('$exam_id', '$sid', 'Pending')";

    mysqli_query($conn, $sqlin);

}

header("Location: ../teacher_monitor_started_exam.php?examid=$exam_id & examname=$exam_name");

?>