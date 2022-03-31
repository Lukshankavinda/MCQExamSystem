<?php

session_start();
include "../db_conn.php";

if (!$conn) {
  echo "Connection Failed !";
  exit();
}
    $examid = $_SESSION['examid'];
    $studentid  =  $_POST["hid_input_stu_0"];

    $sqlget = "SELECT * FROM  question WHERE exam_id ='$examid' ORDER BY question_id ASC";
    $result1 = mysqli_query($conn, $sqlget);

    $length1= mysqli_num_rows($result1);


    for ($i=0; $i < $length1; $i++) { 

    	$student_id  =  $_POST["hid_input_stu_$i"];
    	$exam_id  =  $_POST["hid_input_exam_$i"];
        $question_id  =  $_POST["hid_input_ques_$i"];
        $input_answer     =  $_POST["radio_ans$i"];

    	$sql = "INSERT INTO exam_result_save (id, student_id, exam_id, question_id, input_answer) 
    	VALUES (null, '$student_id', '$exam_id', '$question_id', '$input_answer')";

    	mysqli_query($conn, $sql);

    }

    $sqlup = " UPDATE exam_student_status SET exam_student_status.status = 'Attended', exam_student_status.attended = 'Complete'
               WHERE student_id = '$studentid' AND exam_id = '$examid' ";

    mysqli_query($conn, $sqlup);

    header("Location: ../student_exam_results.php?examid=$examid & studentid=$studentid");

?>