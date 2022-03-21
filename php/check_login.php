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

					header("Location: ../teacher_exam.php");

				}elseif ($row['password'] === $password && $row['role'] == "Student") {

					$_SESSION['email'] = $row['email'] ;
					$_SESSION['password'] = $row['password'] ;
					$_SESSION['role'] = $row['role'] ;

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