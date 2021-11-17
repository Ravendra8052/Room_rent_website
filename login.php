<?php
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
	$mobile=$_POST['mobile'];
	$password=$_POST['password'];

	$check=mysqli_query($conn,"SELECT* FROM `user` WHERE mobile='$mobile' AND password='$password'");
	if(mysqli_num_rows($check)>0)
	{
		$userdata=mysqli_fetch_array($check);
			echo "Login Successfull...";
			$_SESSION['userdata']=$userdata;
			header('refresh:2,url=welcome.php');
	}else{
			echo"error";
	     }
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
	<style type="text/css">
		.container{
			margin: 0 auto;
			width: 450px;
			font-size: 20px;
			margin-top: 8%;
			padding: 70px;
		}
	</style>
</head>
<body>
	<h1 align="center" class="bg-primary p-3 text-uppercase">Login Page</h1>
	<div class="container bg-warning ">
		<form method="post">
			 <input type="number" name="mobile" placeholder="Mobile"><br><br>
			 <input type="password" name="password" placeholder="Password"><br><br>
			<input type="submit" name="submit" class="btn btn-primary">
			Not Register <a href="index.php">Register</a>
		</form>
	</div>
</body>
</html>