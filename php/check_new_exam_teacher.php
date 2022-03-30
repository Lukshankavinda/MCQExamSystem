<?php
session_start();
include "../db_conn.php";


echo "hello";


echo "<br> name".$_POST['new_exam_name'];
echo "<br> date".$_POST['new_exam_date'];
echo "<br> time".$_POST['new_exam_duration'];


?>