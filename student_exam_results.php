<?php 
  session_start(); 
  include "db_conn.php";

  $examid =  $_GET['examid'] ;
  $studentid = $_GET['studentid'] ;

$sqla = "SELECT question_id, right_answer FROM  question WHERE exam_id ='$examid' 
         ORDER BY question_id ASC";

$resulta = mysqli_query($conn, $sqla);

$sqlb = "SELECT question_id, input_answer FROM  exam_result_save WHERE exam_id ='$examid' 
         AND student_id  = '$studentid ' ORDER BY question_id ASC";

$resultb = mysqli_query($conn, $sqlb);


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exam Results</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">

<style>
body {
  margin: 0;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 14%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}

.leftside {
    float: left;
    padding: 10px;
    height: 90vh;
    width: 46%;
}


.top_left {
    border: 1px solid black;
    float: left;
    padding: 10px;
    margin: 5px;
    height: 30vh;
    width: 100%;
}

.bottem_left {
    border: 1px solid black;
    float: left;
    padding: 10px;
    margin: 5px;
    width: 100%;   
}

</style>
</head>
<body>

<ul>
  <li><a href="student_exam.php">Exam</a></li>
  <li><a >Single Exam</a></li>
  <li><a class="active" >Exam Results</a></li>
</ul>

<div style="margin-left:14%;padding:0px">

  <div style=" width:100%; ">
    <form style="height: 40px; background-color:LightGray;"
          action="logout.php">
        <button type="submit" 
                style=" float: right; padding: 1px 20px; margin:0px 8px; height: 40px;" 
                class="btn btn-secondary">Logout
        </button>
    </form>
  </div>
<br>
<div class="container d-flex justify-content-center align-items-center">

    <div class="leftside">

          <div class="top_left">
              <P>Exam Complited</P>
          </div><!--  top left-->

          <div class="bottem_left">
            <p>Question</p>

            <table class="table ">
    <?php   
    $length = mysqli_num_rows($resulta); 
    $length++; ?>

          <tbody>
            
    <?php for ($i=1; $i < $length; $i++) {  ?> 

    <tr><td> <?php
    $rowa  = mysqli_fetch_assoc($resulta);
    $rowb  = mysqli_fetch_assoc($resultb); 
    if ($rowa['right_answer']==$rowb['input_answer']) {
      echo "Question $i <p class='text-success' style='display: inline-block;'>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>correct</b>  </p> <br>";
    }else{
      echo "Question $i <p class='text-danger' style='display: inline-block;'>
            &nbsp;&nbsp;&nbsp;&nbsp; <b>wrong</b>  </p> <br>";
    }?></td></tr>
    <?php } ?>				  
          </tbody>
        </table>

          </div><!-- bottem left  -->

          <div class="d-grid gap-2 d-md-block">
              <form action="student_exam.php" class="inline">

                  <button class="float-left btn btn-secondary" >Closs</button>

              </form>

            </div>

      </div>
        

    </div>
				
	</div>

</body>
</html>