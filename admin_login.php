<?php
	
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<!-- Admin css link-->
<link rel="stylesheet" type="text/css" href="style/admin.css">

</head>
<body>

	<div class="container">
		
		 <form action="admin_login.php" method="post">
		 	<h2>Admin Login</h2>
  			<div class="form-group">
   				<label for="email">Username:</label>
    			<input type="Username" name="email" class="form-control" placeholder="Enter email" id="email">
  			</div>
  			<div class="form-group">
    			<label for="pwd">Password:</label>
    			<input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
  			</div>

  			<input type="submit" name="login" class="btn btn-primary" value="login">
		</form> 

	</div>

</body>
</html>
<?php

	include('db/connection.php');

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$password = $_POST['password'];

		echo $email.$password;

		$sql = "SELECT * FROM admin_login WHERE name = '$email' AND password = '$password'";

		$query = mysqli_query($conn,$sql);

		if($query){
			if(mysqli_num_rows($query)>0){

				$_SESSION['email']=$email;

				header('location:home.php');
			}else{
				echo "<script>  alert('Invalid input ,Please Try Again')</script>";
			}
		}

	}





?>