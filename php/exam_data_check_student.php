<?php

    include "db_conn.php";

    if (isset($_SESSION['email']) && $_SESSION['role'] == "Student" )
    {   
        $sid = $_SESSION['student_id'];

        $sql = "SELECT exam_student_status.status , exam.exam_name , exam.exam_start , exam.exam_duration 
                FROM  exam_student_status , exam WHERE  exam_student_status.exam_id = exam.exam_id 
                AND exam_student_status.student_id = '$sid'";
       
        $student_exam_result = mysqli_query($conn, $sql); 
        
        
    }
    else
    {
        header("Location: index.php");
    }
  //
?>