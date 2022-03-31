<?php

include "db_conn.php";

$examid  ;
$studentid ;
  
$sqlaa = "SELECT question_id, right_answer FROM  question WHERE exam_id ='$examid' 
         ORDER BY question_id ASC";

$resultaa = mysqli_query($conn, $sqlaa);

$sqlbb = "SELECT question_id, input_answer FROM  exam_result_save WHERE exam_id ='$examid' 
         AND student_id  = '$studentid ' ORDER BY question_id ASC";

$resultbb = mysqli_query($conn, $sqlbb);

$lengthaa = mysqli_num_rows($resultaa);
$count = 0 ;
for ($i=1; $i < $lengthaa; $i++) {  

    $rowaa  = mysqli_fetch_assoc($resultaa);
    $rowbb  = mysqli_fetch_assoc($resultbb); 
    if ($rowaa['right_answer']==$rowbb['input_answer']) {    $count++; }

} 
$tmarks = (($count/$lengthaa)*100); 
$sqlc = "INSERT INTO exam_result(exam_id, student_id, result) 
    	 VALUES ('$examid', '$studentid ', '$tmarks')";
mysqli_query($conn, $sqlc);

    if ($tmarks > 30 ) {
        echo "<h1 class='text-success'>Pass </h1> <br>" ;
    }else{
        echo "<h1 class='text-danger'>Fail </h1> <br>" ;
    }

    if ($tmarks >= 75 ) {
       echo "A - $tmarks points";
    }elseif (($tmarks < 75)&&($tmarks >= 65 )) {
        echo "B - $tmarks points";
    }elseif (($tmarks < 65)&&($tmarks >= 55 ) ) {
        echo "C - $tmarks points";
    }elseif (($tmarks < 55)&&($tmarks >= 30 )) {
        echo "S - $tmarks points";
    }else{
        echo "F - $tmarks points";
    }    