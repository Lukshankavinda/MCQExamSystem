<?php 
	session_start();
	include "../db_conn.php";

	if (isset($_POST['user_name']) && isset($_POST['password']) ) {
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test_input($_POST['user_name']);
		$password = test_input($_POST['password']);

		if (empty($username)) {
			header("Location: ../index.php?error=Email Address is required");

		} elseif (empty($password)) {
			header("Location: ../index.php?error=Password is required");

		} else{

			$sql = "SELECT * FROM  user WHERE email ='$username' AND password = '$password'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
				$row  = mysqli_fetch_assoc($result);
				if ($row['password'] === $password && $row['role'] == "Teacher") {

					$_SESSION['email'] = $row['email'] ;
					$_SESSION['password'] = $row['password'] ;
					$_SESSION['role'] = $row['role'] ;

					$sqltid = "SELECT teacher_id FROM  teacher WHERE teacher_email = '$username'";
					$resulttid = mysqli_query($conn, $sqltid);
					$row2  = mysqli_fetch_assoc($resulttid);
					$_SESSION['teacher_id'] =  $row2['teacher_id'] ;

					header("Location: ../teacher_exam.php");

				}elseif ($row['password'] === $password && $row['role'] == "Student") {

					$_SESSION['email'] = $row['email'] ;
					$_SESSION['password'] = $row['password'] ;
					$_SESSION['role'] = $row['role'] ;

					$sqlsid = "SELECT student_id FROM  student WHERE student_email = '$username'";
					$resultsid = mysqli_query($conn, $sqlsid);
					$row1  = mysqli_fetch_assoc($resultsid);
					$_SESSION['student_id'] =  $row1['student_id'] ;

					header("Location: ../student_exam.php");

				}else {
					header("Location: ../index.php?error=Incroect Email Address Password");
				}
			}

		}

	} else {
		header("Location: ../index.php");
	}

 ?>