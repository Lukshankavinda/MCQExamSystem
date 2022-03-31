<?php 
  session_start(); 
  include "db_conn.php";

  $examid =  $_GET['examid'] ;
  $examname =  $_GET['examname'] ;

  $sqla = "SELECT student_id, attended FROM  exam_student_status WHERE exam_id ='$examid' 
           ORDER BY student_id ASC";

  $resulta = mysqli_query($conn, $sqla);
  $length = mysqli_num_rows($resulta); 

  $sqlc = "SELECT  attended FROM  exam_student_status WHERE attended ='Complete'";

  $resultc = mysqli_query($conn, $sqlc);
  $lengthc = mysqli_num_rows($resultc); 

  $sqlb = "SELECT exam_start, exam_duration FROM  exam WHERE exam_id ='$examid' ";

  $resultb = mysqli_query($conn, $sqlb);
  $rowb  = mysqli_fetch_assoc($resultb);
  $exam_start = $rowb['exam_start'];
  $exam_duration = $rowb['exam_duration'];

  $secs = strtotime($exam_duration)-strtotime("00:00:00");
  $exam_end = date("Y-m-d H:i:s",strtotime($exam_start)+$secs);


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
            <button type="submit"
                style=" float: right; padding: 1px 20px; margin:0px 8px; height: 40px;" 
                class="btn btn-secondary">Logout
            </button>
        </form>
    </div>

    <h5> 	&nbsp;&nbsp; <?=$examname?> </h5>

    <div class="leftside">

        <div class="top_left">
            <P>Exam Complited</P><br>

            <h1 class="text-center"><b><?=$lengthc?>/<?=$length?></b></h1>

            <h5 class="text-center">Time Left :</h5>
            <h5 class="text-center" id="demo"></h5>
    
            <script>
                // Set the date we're counting down to
                var countDownDate = new Date("Jan 1, 2023 00:00:00").getTime();

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
        </div><!--  top left-->

        <div class="bottem_left">
                <br>
                <p><b> Exam started time  &nbsp;&nbsp; <?=$exam_start?> <br><br>
                       Exam ending time  &nbsp;&nbsp; <?=$exam_end?>
                </b></p>
                <br>
        </div><!-- bottem left  -->

    </div>

    <div class="rightside">

        <div class="top_right">
            <p>Attending Student list</p> <br><br>

            <table  class="top_right_table" >
                <tbody>
                
                <?php  

                $length++; 
                for ($i=1; $i < $length; $i++) {  

                ?> 
            
                <tr>
                <?php $rowa  = mysqli_fetch_assoc($resulta); ?>
                    <td>Student <?=$i?></td>
                    <td><?=$rowa['attended']?></td>

                </tr>
                <?php } ?>	

                </tbody>

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