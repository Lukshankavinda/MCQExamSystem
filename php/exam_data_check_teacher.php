<?php

if (isset($_SESSION['email']) && $_SESSION['role'] == "Teacher" )
{
    $sql = "SELECT exam_status.last_update , exam_status.status , exam.exam_name 
            FROM  exam_status , exam  WHERE  exam_status.exam_id = exam.exam_id ";
   
	$teacher_exam_result = mysqli_query($conn, $sql);
    
}
 
else
{
    header("Location: index.php");
}


?>
 