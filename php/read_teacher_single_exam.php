<?php

    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }


    $sql = "SELECT question, answer_1, answer_2, answer_3, answer_4   
            FROM  question WHERE exam_id ='3002' ORDER BY question_id ASC";
       
    $teacher_single_exam_result = mysqli_query($conn, $sql);
        
?>