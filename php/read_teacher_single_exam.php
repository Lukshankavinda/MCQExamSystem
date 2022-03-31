<?php
    session_start(); 
    include "db_conn.php";


    if($conn === false){
        die("ERROR: Could not connect. " 
            . mysqli_connect_error());
    }

    if (isset($_GET['examid']) ) {
        $exid = $_GET['examid'] ;
        $_SESSION['examid'] = $_GET['examid'] ;
    }else{

        $exid = $_SESSION['examid'] ;
    }

    $exid = $_SESSION['examid'] ;
    

    $sql = "SELECT question, answer_1, answer_2, answer_3, answer_4   
            FROM  question WHERE exam_id ='$exid' ORDER BY question_id ASC";
       
    $teacher_single_exam_result = mysqli_query($conn, $sql);

    $_SESSION['examname'] ;
        
?>