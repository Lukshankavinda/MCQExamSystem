<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
		  rel="stylesheet" 
		  ntegrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
		  crossorigin="anonymous">


</head>

<body>
	<div class="container d-flex justify-content-center align-items-center"
		 style="min-height: 100vh;">
		 
		<form class="border p-5 rounded"
			  action="php/check_login.php"
			  method="post">

			<?php if (isset($_GET['error'])) { ?>
				<div class="alert alert-danger" role="alert">
					<?=$_GET['error']?>
				</div>
			<?php } ?>

		    <div class="mb-3">
			    <label for="Email_for_user_name" 
			    	   class="form-label">Email Address</label>

			    <input type="text" 
			    	   name="user_name"
			    	   class="form-control" 
			    	   id="Email_for_user_name"
			    	   placeholder="Email Address">
		    </div>

		    <div class="mb-3">
			    <label for="login_password" 
			    	   class="form-label">Password</label>

			    <input type="password" 
			    	   name="password"
			    	   class="form-control" 
			    	   id="login_password"
			    	   placeholder="Password">
		    </div>

		    <button type="submit" 
		  		  style="width: 100%;" 
		  		  class="btn btn-primary">Sign in</button>

		</form>

	</div>
</body>
</html>