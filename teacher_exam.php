<?php 
	session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Exam</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
          crossorigin="anonymous">
          
</head>
<body>
<!DOCTYPE html>
<html>
<head>
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

.tesearch input[type=text] {
    border: 2px solid #c4b8b8;
    border-radius: 5px;
    float: left;
    width: 18%;
    padding: 5px;
    margin: 5px ;

}

.tesearch button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #3535df;
    float: left;
    width: 7%;
    padding: 6px;
    margin: 6px 10px;
    color: #ffffff;

}

.tenewexam button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #13d896;
    float: right;
    width: 10%;
    padding: 5px;
    margin: 5px ;
    color: #ffffff;

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
    height: 27px;
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
</style>
</head>
<body>



<ul>
  <li><a class="active" href="teacher_exam.php">Exam</a></li>
  <li><a href="teacher_single_exam.php">Single Exam</a></li>
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

   <div class="tebody" style="margin: 5px ;">

    <div class="tesearch">
        <form >
            <input type="text" name="search" >
            <button type="submit">Search</button>
        </form>
    </div>

    <div class="tenewexam">
        <form action="teacher_single_exam.php">
            <button onclick="window.location.herf='teacher_single_exam.php';" >New Exam
            </button>
        </form>
    </div>

    <div >
        <table class="tetable">
            <tr>
                <th>Exam</th>
                <th>Last Update</th>
                <th>Status</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>

    </div>
</div>

</body>
</html>



</body>
</html>

<?php 

 ?>