<?php 
  session_start();

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

.student_exam_result_form_div {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
}

.question_table{
  border: 1px solid black;
  border-collapse: collapse;
  width: 70%;
  padding: 5px;
  margin: 5px ;
  text-align: left;

}
.question_table td {
  height: 10px;
  padding: 10px;
  margin: 5px ;

}

.question_table tr{

  border: 1px solid black;
  height: 10px;
  padding:  10px;
  margin: 5px ;

}

</style>
</head>
<body>

<ul>
  <li><a href="student_exam.php">Exam</a></li>
  <li><a href="student_single_exam.php">Single Exam</a></li>
  <li><a class="active" href="student_exam_results.php">Exam Results</a></li>
</ul>

<div style="margin-left:14%;padding:0px">



 <div style=" width:100%; ">
        <form style="height: 40px; background-color:LightGray;"
            action="logout.php">
            <button onclick="window.location.herf='logout.php';" 
                style=" float: right; padding: 1px 20px; margin:0px 8px; height: 40px;" 
                class="btn btn-secondary">Logout
            </button>
        </form>
    </div>
  
    <div class="student_exam_result_form_div" >

<p>Question</p> <br><br>

            <table  class="question_table" >
            <tr>
                <td>Question 1</td>
                <td>Correct</td>

            </tr>
            <tr>
                <td>Question 2</td>
                <td>Wrong</td>

            </tr>
            <tr>
                <td>Question 3</td>
                <td>Correct</td>

            </tr>
        </table>

</div>
<form >
    <button type="submit" >Close</button>
</form>

</div>



</body>
</html>