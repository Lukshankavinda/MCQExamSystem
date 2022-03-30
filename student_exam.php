<?php 
	session_start(); 
  include "db_conn.php";
  if (isset($_SESSION['email'] )) {
    $studentid = $_SESSION['student_id'];
    
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

.sesearch input[type=text] {
    border: 2px solid #c4b8b8;
    border-radius: 5px;
    float: left;
    width: 18%;
    padding: 5px;
    margin: 5px ;

}

.sesearch button{
    border: 1px solid #ffffff;
    border-radius: 5px;
    background-color: #3535df;
    float: left;
    width: 7%;
    padding: 6px;
    margin: 6px 10px;
    color: #ffffff;

}

.setable {
    border: 1px solid black;
    border-collapse: collapse;
    width:99%;
    float: left;
    padding: 5px;
    margin: 5px ;
    text-align: left;

}
.setable td {
    border: 1px solid black;
    border-collapse: collapse;
    height: 25px;
    padding: 5px 5px 5px 10px;
    margin: 5px ;

  }

.setable th{
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
  <li><a class="active" >Exam</a></li>
  <li><a >Single Exam</a></li>
  <li><a >Exam Results</a></li>
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


  <div class="sesearch">
        <form action="">
            <input type="text" name="search" >
            <button type="submit" >Search</button>
        </form>
    </div>

    <div>
        
        <table  class="setable" >
            <tr>
                <th>Exam</th>
                <th>Starting Time</th>
                <th>Exam Duration</th>
                <th>Status</th>
            </tr>
            <?php  include "php/exam_data_check_student.php";
            if (mysqli_num_rows($student_exam_result)){ 

            while ($rows = mysqli_fetch_assoc($student_exam_result)) { ?>
            <tr>
                <td><a style="text-decoration: none ; color: inherit;"
                       href="php/check_exam_student.php?exname=<?=$rows['exam_name']?>&studentid=<?=$studentid?>">
                       <?=$rows['exam_name']?>
                    </a></td>
                <td><?=$rows['exam_start']?></td>
                <td><?=$rows['exam_duration']?></td>
                <td><?=$rows['status']?></td>
            </tr>
            <?php    } ?>
        </table>
        <?php   } ?>
    </div>
</div>


</body>
</html>
<?php 
    }else{
        header("Location: index.php");
    }

 ?>