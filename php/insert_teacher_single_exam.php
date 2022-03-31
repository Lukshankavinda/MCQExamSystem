<?php
    session_start(); 
    include "../db_conn.php";

    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }


    $question =  $_REQUEST['qname'];
    $answer1 =  $_REQUEST['answer1'];
    $answer2 =  $_REQUEST['answer2'];
    $answer3 =  $_REQUEST['answer3'];
    $answer4 =  $_REQUEST['answer4'];
    $right_answer =  $_REQUEST['right_answer'];
    $exid = $_SESSION['examid'];


      $sql = " INSERT INTO `question` 
            (   `question_id`,
                `exam_id`, 
                `question`, 
                `answer_1`, 
                `answer_2`,
                `answer_3`, 
                `answer_4`, 
                `right_answer`)
             VALUES (
                 NULL, 
                 '$exid',
                 '$question', 
                 ' $answer1',
                 '$answer2',
                 '$answer3',
                 '$answer4',
                 '$right_answer')";

    if(mysqli_query($conn, $sql)){

        $date = date('y-m-d h:i:s');
        
        $sqlup = " UPDATE exam_status SET last_update = '$date' 
                   WHERE exam_id = '$exid'";

        mysqli_query($conn, $sqlup);

        header("Location: ../teacher_single_exam.php");
    
    
    } else{
        echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
    }


?>