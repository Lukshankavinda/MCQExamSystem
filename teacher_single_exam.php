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

* {
  box-sizing: border-box;
}

/* Create two unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 90vh;
  
}

.left {
  width: 65%;
 
}

.right {
  width: 34%;
  border: 1px solid black;
}
 
.ans{
  width: 70%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.tetable{
    border: 1px solid black;
    border-collapse: collapse;
    width:99%;
    float: left;
    margin: 5px ;
    text-align: left;

}
.tetable td {
    border: 1px solid black;
    border-collapse: collapse;
    height: 25px;
    padding: 5px 5px 5px 10px;
    margin: 5px ;

}

.tetable th{
    border: 1px solid black;
    border-collapse: collapse;
    height: 20px;
    padding: 5px 5px 5px 10px;
    margin: 5px ;
    background-color: #6bcee7;

}

.addque button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #ec3737;
    float: right;
    width: 20%;
    padding: 10px 5px;
    margin: 10px 5px;
    color: #ffffff;

}

.pubpape button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #420b50;
    float: right;
    width: 20%;
    padding: 10px 5px;
    margin: 10px 5px;
    color: #ffffff;

}

.exdate{

    border: 1px solid black;
    border-radius: 5px;
    background-color: #420b50;
    float: left;
    width: 30%;
    padding: 10px 5px;
    margin: 10px 5px;
    color: #ffffff;

}
.save_btn{
    border: 1px solid #ffffff;
    border-radius: 5px;
    float: right;
    width: 20%; 
    padding: 10px 5px ; 
    margin: 10px 5px; 
    background-color: #13d896;
    color: #ffffff;

}

</style>
</head>
<body>

<ul>
  <li><a  href="teacher_exam.php">Exam</a></li>
  <li><a class="active" href="teacher_single_exam.php">Single Exam</a></li>
  <li><a href="teacher_monitor_started_exam.php">Monitor Started Exam</a></li>
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
    <div class="row">
      <div class="column left" >
  
        <div class="tebody">



            <div class="addque">
                <form action="teacher_single_exam.php">
                    <button type="submit" >Add Question</button>
                </form>
            </div>

            <div >
                <table class="tetable caption-top">
                    <caption style="text-align:left">Question List</caption>
                    <tr>
                        <th>Question</th>
                        <th>Answers</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        
                    </tr>
                </table>

            </div>

            <div class="pubpape">
                <form >
                    
                    <button type="submit" >Publish Paper</button>
                </form>
            </div>
        </div>
    </div>

    <div class="column right" >
    <form action="" method="post">
            <input type="text" 
                   class="question_name ans" 
                   placeholder="Question Name" 
                   name="qname"><br><br>
            <p>Answers List</p><br>

            <input type="text" 
                   class="ans" 
                   placeholder="Answer 01" 
                   name="answer1">  	&nbsp;

            <input type="radio" id="answer1" name="Write Answer" value="answer1">  <br><br>

            <input type="text" 
                   class="ans" 
                   placeholder="Answer 02" 
                   name="answer2"> 	&nbsp;

            <input type="radio" id="answer2" name="Write Answer" value="answer2"> <br><br>

            <input type="text" 
                   class="ans" 
                   placeholder="Answer 03" 
                   name="answer3"> 	&nbsp;

            <input type="radio" id="answer3" name="Write Answer" value="answer3"> <br><br>

           <input type="text" 
                   class="ans" 
                   placeholder="Answer 04" 
                   name="answer4"> 	&nbsp;

            <input type="radio" id="answer4" name="Write Answer" value="answer4"> <br><br>

            <button type="submit" class="save_btn" > Save </button>

        </form>
    </div>
  </div>
    
</div>

</body>
</html>