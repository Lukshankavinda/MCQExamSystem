<?php 
  session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Single Exam</title>
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

.student_exam_form_div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}

.student_exam_form {
  border: 2px solid #f1f1f1;
  padding: 40px;
  width: 30%;
}

.x{
  display:flex;
  float: center;
  width: 6%;
  padding: 10px;
  height: 30px; /* Should be removed. Only for demonstration */
}
</style>
</head>
<body>

<ul>
  <li><a href="student_exam.php">Exam</a></li>
  <li><a class="active" href="student_single_exam.php">Single Exam</a></li>
  <li><a href="student_exam_results.php">Exam Results</a></li>
</ul>

<div style=" margin-left:14% ; padding:0px ;" >

    <div style=" width:100%; ">
      <form style="height: 40px; background-color:LightGray;"
            action="logout.php">
          <button onclick="window.location.herf='logout.php';" 
                  style=" float: right; padding: 1px 20px; margin:0px 8px; height: 40px;" 
                  class="btn btn-secondary">Logout
          </button>
      </form>
    </div><br><br>

    <h5 class="text-center">Time Left :</h5>
    <h5 class="text-center" id="demo"></h5>
    
    <script>
      // Set the date we're counting down to
      var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();
          
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
          
        // Time calculations for days, hours, minutes and seconds
        
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML =  + hours + "h "
        + minutes + "m " + seconds + "s ";
          
        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
        }
      }, 1000);
    </script>

    <p class="lead text-center">
       Q: What is question one
    </p>
    <div class="container d-flex justify-content-center align-items-center">
        
        <form  class="student_exam_form" >
            
            <input type="radio" id="answer1" name="Write Answer" value="answer1"> &nbsp;&nbsp;
            <label for="answer1">  Answer 1 </label> <br>
            <input type="radio" id="answer2" name="Write Answer" value="answer2"> &nbsp;&nbsp;
            <label for="answer2">  Answer 2 </label> <br>
            <input type="radio" id="answer3" name="Write Answer" value="answer3"> &nbsp;&nbsp;
            <label for="answer3">  Answer 3 </label> <br>
            <input type="radio" id="answer4" name="Write Answer" value="answer4"> &nbsp;&nbsp;
            <label for="answer4">  Answer 4 </label> <br>

        </form>

    </div>
    <form class="container d-flex justify-content-center align-items-center gap-2 col-6 mx-auto">
      <div class="btn-group" role="group" aria-label="Basic example">
          <button type="button" class="btn btn-secondary ">Prev</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-light">Question</button> &nbsp;&nbsp;
          <button type="button" class="btn btn-secondary">Next</button> &nbsp;&nbsp;
      </div>
    </form>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <form action="">
            <button type="submit" class="btn btn-success me-md-2 " >save</button>
            <button type="submit" class="btn btn-primary me-md-2" >Complete</button>
        </form>
    </div>


</div>

</body>
</html>