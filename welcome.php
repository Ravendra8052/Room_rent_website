<?php 
session_start();
if(!isset($_SESSION['userdata'])){
	header('location:login.php');
}

$userdata=$_SESSION['userdata'];
$ide=$userdata['id'];
?>
<?php
include'connection.php';
if(isset($_POST['submit'])){
	$name=    $_POST['name'];
    $mobile=  $_POST['mobile'];
    $address= $_POST['address'];
    $prize=   $_POST['prize'];

    $file1       =$_FILES['images1'];
    $filename1   =$file1['name'];
    $filepath1   =$file1['tmp_name'];
    $fileerror1  =$file1['error'];
    if($fileerror1==0){
        $destfile1='result/...'.$filename1;
        move_uploaded_file($filepath1, $destfile1);
    }   
    $file2       =$_FILES['images2'];
    $filename2   =$file2['name'];
    $filepath2   =$file2['tmp_name'];
    $fileerror2  =$file2['error'];
    if($fileerror2==0){
        $destfile2='result2/...'.$filename2;
        move_uploaded_file($filepath2, $destfile2);
    }   
    $file3       =$_FILES['images3'];
    $filename3   =$file3['name'];
    $filepath3  =$file3['tmp_name'];
    $fileerror3  =$file3['error'];
    if($fileerror3==0){
        $destfile3='result3/...'.$filename3;
        move_uploaded_file($filepath3, $destfile3);
    }   
    $file4       =$_FILES['images4'];
    $filename4   =$file4['name'];
    $filepath4   =$file4['tmp_name'];
    $fileerror4  =$file4['error'];
    if($fileerror4==0){
        $destfile4='result4/...'.$filename4;
        move_uploaded_file($filepath4, $destfile4);
    }   
$query=mysqli_query($conn,"INSERT INTO `filestore`(`name`, `mobile`,`address`,`prize`,`images1`,`images2`,`images3`,`images4`,`user_id`) VALUES('$name','$mobile','$address','$prize','$destfile1','$destfile2','$destfile3','$destfile4','$ide')");

if($query){
	echo "Successfull";
	header('refresh:1.5,url=welcome.php');

}else{
	echo "error find";
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
    <style type="text/css">
      
     @media screen and (max-width:600px){
            
            *{
                font-size: 10px;
            }
            }
    </style>
</head>
<body>
<center>
<div class="table-responsive">
<table class="table">
<form method="post" action="#" enctype="multipart/form-data">
	<tr><td class="bg-primary p-3"align="center"><h4>ADD ROOM</h4></td></tr>

	<tr><td><input type="text" name="name" placeholder="Name" required></td></tr>
    <tr><td><input type="number" name="mobile" placeholder="Mobile" required></td></tr>
    <tr><td><input type="text" name="address" placeholder="Address" required></td></tr>
    <tr><td><input type="number" name="prize" placeholder="Price" required></td></tr>

    <tr><td><input type="file" name="images1" required></td></tr>
    <tr><td><input type="file" name="images2" required></td></tr>
    <tr><td><input type="file" name="images3" required></td></tr>
    <tr><td><input type="file" name="images4"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="submit"></td></tr>
</form>
</table>
</div>
<div class="table-responsive">
<table border="1" class="table table-bordered">
    	<thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Address</th>
      <th scope="col">Price</th>
      <th scope="col">Image 1</th>
      <th scope="col">Image 2</th>
      <th scope="col">Image 3</th>
      <th scope="col">Image 4</th>
    </tr>
  </thead>
    <?php
        $query1=mysqli_query($conn,"SELECT * FROM `filestore` WHERE user_id='$ide'");
    	   while ($res=mysqli_fetch_array($query1)){
    	
    ?>

    	<tr>
    		<td><?php echo $res['name']?></td>
            <td><?php echo $res['mobile']?></td>
            <td><?php echo $res['address']?></td>
            <td><?php echo $res['prize']?></td>
            <td><img src="<?php echo $res['images1'];?>" alt="image fatch error" width="70px"></td>
            <td><img src="<?php echo $res['images2'];?>" alt="image fatch error" width="70px"></td>
            <td><img src="<?php echo $res['images3'];?>" alt="image fatch error" width="70px"></td>   
            <td><img src="<?php echo $res['images4'];?>" alt="image fatch error" width="70px"></td>
             
        </tr>
    	<?php
    	   }
    	?>
</table>
</div>

</body>
</html>