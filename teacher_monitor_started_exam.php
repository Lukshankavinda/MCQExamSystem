<?php 
  session_start();

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Monitor Started Exam</title>
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

.bottem_button button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #ec3737;
    float: right;
    width: 20%;
    padding: 10px 5px;
    margin: 10px 5px;     
    color: #ffffff;
}

.leftside {
    float: left;
    padding: 10px;
    height: 90vh;
    width: 46%;
}

.rightside {
    float: right;
    padding: 10px;
    height: 90vh;
    width: 46%;
}

.top_left {
    border: 1px solid black;
    float: left;
    padding: 10px;
    margin: 5px;
    height: 40vh;
    width: 100%;
}

.bottem_left {
    border: 1px solid black;
    float: left;
    padding: 10px;
    margin: 5px;
    height: 40vh;
    width: 100%;   
}

.top_right {
    border: 1px solid black;
    float: right;
    padding: 10px;
    margin: 5px;
    height: 80vh;
    width: 100%;
}

.top_right_table{
    border: 1px solid black;
    border-collapse: collapse;
    width: 70%;
    padding: 5px;
    margin: 5px ;
    text-align: left;

}
.top_right_table td {
    height: 10px;
    padding: 10px;
    margin: 5px ;
}

.top_right_table tr{

    border: 1px solid black;
    height: 10px;
    padding:  10px;
    margin: 5px ;    
}

</style>
</head>
<body>

<ul>
  <li><a href="teacher_exam.php">Exam</a></li>
  <li><a href="teacher_single_exam.php">Single Exam</a></li>
  <li><a class="active" href="teacher_monitor_started_exam.php">Monitor Started Exam</a></li>
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

    <div class="leftside">

        <div class="top_left">
                <P>Exam Complited</P>
        </div><!--  top left-->

        <div class="bottem_left">
                <p>Exam started time <br>
                   Exam ending time
                </p>
        </div><!-- bottem left  -->

    </div>

    <div class="rightside">

        <div class="top_right">
            <p>Attending Student list</p> <br><br>

            <table  class="top_right_table" >
            <tr>
                <td>Student 1</td>
                <td>Not Complited</td>

            </tr>
            <tr>
                <td>Student 2</td>
                <td>Complited</td>

            </tr>
            <tr>
                <td>Student 3</td>
                <td>Not Complited</td>

            </tr>
        </table>
        </div><!-- right -->

        <div class="bottem_button">
                <form >
                    <button type="submit" >End Exam</button>
                </form>
        </div>
    </div>

</div>

</body>
</html>