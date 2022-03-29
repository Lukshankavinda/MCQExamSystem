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
    height: 40vh;
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
          <br>
	        <div class="bottem_left">
	        	<p>Question</p>
	        </div><!-- bottem left  -->

          <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-secondary" type="button">Closs</button>
          </div>

    	</div>
				
	</div>

</body>
</html>