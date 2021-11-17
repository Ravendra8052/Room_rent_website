<?php
include 'connection.php';
if(isset($_POST['submit']))
{

	$name		=$_POST['name'];
	$mobile		=$_POST['mobile'];
	$image		=$_FILES['image'];
	$filename	=$image['name'];
	$filepath	=$image['tmp_name'];
	$fileerror	=$image['error'];
	if($fileerror==0){
		$destfile='upload/...'.$filename;
		move_uploaded_file($filepath, $destfile);
	}
	$password	=$_POST['password'];


	
$select=mysqli_query($conn,"SELECT `id`FROM `user` WHERE mobile='$mobile'");

	if(mysqli_num_rows($select)>0){
		echo "<script>alert('Mobile Already enter....!')</script>";
	}else{

$query=mysqli_query($conn,"INSERT INTO `user`(`name`, `mobile`, `image`,`password`)VALUES('$name','$mobile','$destfile','$password')");

if($query){
	echo "<script>alert('Success....')</script>";
	header('refresh:1,url=login.php');

}else{
	echo"<script>alert('Error....')</script>";
	header('refresh:1,url=index.php');

}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css">
		body{
			margin: 0 auto;
			font-size: 30px;
			background-color: transparent;
		}
		input[type=text],input[type=password],input[type=tel],input[type=file]{
			border: 1px solid black;
			width: 100%;
			padding: 10px;
			margin-bottom: 5%;
			border-radius: 5px;
		}
		input[type=submit]{
			font-size: 25px;
			padding: 5px;
			width: 102%;
			margin-bottom: 3%;
			border-radius: 8px;
			background-color: lightgreen;
		}
		h1{
			background-color: lightblue;
			text-align: center;
			padding: 15px;
			margin-top: 0px;
		}
		table{
			width: 50%;
			padding: 5%;
			border-radius: 8px;
			font-size: 25px;
			background-color: #ccc;
		}
	</style>

	

</head>
<body>
	<h1>Registration Page</h1>
<table align="center">
<form method="post" action="#" enctype="multipart/form-data">
<tr><td><input type="text" name="name" placeholder="Name" required></td></tr>
<tr><td><input type="tel" name="mobile" placeholder="Mobile" required></td></tr>
<tr><td><input type="file" name="image" required></td></tr>
<tr><td><input type="password" name="password" placeholder="Password" required></td></tr>
<tr><td align="center"><input type="submit" value="Register" name="submit"></td></tr>
<tr><td align="center">Already Account <a href="login.php">login</a></td></tr>
</form>
</table>
</body>
</html>