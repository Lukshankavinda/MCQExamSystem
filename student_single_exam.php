<?php 
  session_start();
  
  include "db_conn.php";

  if (!$conn) {
    echo "Connection Failed !";
    exit();
  }

  $abc = "SELECT * FROM  question WHERE exam_id ='3002' ORDER BY question_id ASC";

  $result = mysqli_query($conn, $abc);

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
  * {
  box-sizing: border-box;
}

#regForm {
  background-color: #f1f1f1;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

.student_exam_form_div {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  flex-direction: column;
}
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}

p.start {
    display: inline-block;
}

h5.start {
    display: inline;
}

body {
  margin: 0;
  background-color: #ffffff;
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

.x{
  display:flex;
  float: center;
  width: 6%;
  padding: 10px;
  height: 30px; /* Should be removed. Only for demonstration */
}
input {
  padding: 20px;
  
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
          <button type="submit"
                  style=" float: right; padding: 1px 20px; margin:0px 8px; height: 40px;" 
                  class="btn btn-secondary">Logout
          </button>
      </form>
    </div>
    <?php
	if (mysqli_num_rows($result)){ 
    $length = mysqli_num_rows($result); ?>

<form id="regForm" action="">

  	<p class="start">Time Left :</p>
  	<h5 class="start" id="demo"></h5>
  
    <?php
		for ($i=0; $i < $length; $i++) { 
        $rows = mysqli_fetch_assoc($result) ;  ?> 

    <div class="tab">
        	<h5> Q : <?=$rows['question']?></h5><br>
          <div style="border: 2px solid #aaaaaa; padding:10px; width: 50%;">
            &nbsp;&nbsp;<input type="radio" id="answer1" name="Write Answer" value="01"> &nbsp;&nbsp;
            <label for="answer1">  <?=$rows['answer_1']?> </label> <br> 
            &nbsp;&nbsp;<input type="radio" id="answer2" name="Write Answer" value="02"> &nbsp;&nbsp;
            <label for="answer2">  <?=$rows['answer_2']?> </label> <br>
            &nbsp;&nbsp;<input type="radio" id="answer3" name="Write Answer" value="03"> &nbsp;&nbsp;
            <label for="answer3">  <?=$rows['answer_3']?> </label><br>
            &nbsp;&nbsp;<input type="radio" id="answer4" name="Write Answer" value="04"> &nbsp;&nbsp;
            <label for="answer4"> <?=$rows['answer_4']?> </label> <br>
          </div>
    </div>
   <?php } ?>
   <br>
  <div style="overflow:auto;" 
  	   class="container d-flex justify-content-center align-items-center gap-2 col-6 mx-auto">
    <div style="float:left;">
      <button type="button" 
      		  id="prevBtn" 
      		  class="btn btn-secondary"
      		  onclick="nextPrev(-1)">Previous
      </button>
    </div>
    &nbsp;
    <button type="button" class="btn btn-light">Question</button> 
    &nbsp;
    <div style="float:right;">
      <button type="button" 
      		  id="nextBtn" 
      		  class="btn btn-secondary "
      		  onclick="nextPrev(1)">Next
      </button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
  	<?php
		for ($i=0; $i < $length; $i++) {  ?> 
    <span class="step"></span>

    <?php } ?>
  </div>
</form>

<?php } ?>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Complete";
    nextBtn.style.backgroundColor = '#0d6efd';
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

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
</div>

</body>
</html>