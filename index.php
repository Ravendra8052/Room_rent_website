<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
	<style type="text/css">

		body{
			padding: 100px;
			padding-top: 2px;
		}
		button{
			float: right;
			margin-right: 10px;
			margin-bottom: 10px;
		}
		a{
	      		text-decoration: none;
	      		color: blue;
	      		cursor: pointer;

	      	}

		*{
			text-transform: capitalize;

		}
		.font-bold{
			font-weight: bold;
		}
		.image{
			width: 100%;
			height: 800px;
			padding: 80px;
			padding-top: 2px;
			padding-bottom: 2px;
		}
		table,tr,td{
	      		border: 1px solid black;
	      		padding: 10px;
	      	}
	      	h1,button{
	      		color: white;
	      		text-transform: uppercase;
	      	}
	      	input[type=search]{
	      		float: right;
	      		font-size: 20px;
	      		padding: 10px;
	      	}
	      	.border{
	      		text-align: center;
	      		color: white;
	      	}
	      	table td tr button{
	      		float: left;
	      	}
		@media screen and (max-width:600px){
	      .image{
	   		width: 100%;
	   		height: 200px;
	   		padding: 0PX;
	      		}
	      	table,tr,td{
	      		border: 1px solid red;

	      	}
	      	h1,button{
	      		color: white;
	      		text-transform: uppercase;
	      	}
	      	input[type=search]{
	      		width: 100px;
	      		height: 35px;
	      		padding: 10px;
	      		font-size: 15px;
	      	}
	      	.border{
	      		text-align: center;
	      		color: white;
	      		text-transform: uppercase;
	      	}
	      	body{
	      		padding: 5px;
	      	}
	      	a{
	      		text-decoration: none;
	      		color: blue;
	      		cursor: pointer;

	      	}

	      	}
	</style>
</head>
<body class="bg-light">
	<h1 class="bg-primary p-3">Search Room<input type="search" placeholder="Search" id="myInput" onkeyup="myFunction()"></h1>
	<a href="index.php"><button class="bg-primary p-3 float-right">Registration</button></a>
	<table  align="center" width="100%" id="myTable">
		<?php 
			include'connection.php';
			$query="SELECT * FROM filestore";
			$run=mysqli_query($conn,$query);
			while ($res=mysqli_fetch_array($run)){
			?>
		<tr><td class="font-bold">Name:</td><td>	<?php echo $res['name'];?></td></tr>
		<tr><td class="font-bold">Mobile:</td><td>	<?php echo $res['mobile'];?></td></tr>
		<tr><td class="font-bold">Address:</td><td>	<?php echo $res['address'];?></td></tr>
		<tr><td class="font-bold">Price:</td><td class="font-bold bg-warning"><?php echo $res['prize'];?></td></tr>
		<tr><td colspan="2"><img src="<?php echo $res['images1'];?>" alt="images" class="image" id="slider"></td></tr>
	
	<tr><td colspan="2"><img src="<?php echo $res['images2'];?>" alt="images" class="image" id="slider"></td></tr>
	
	<tr><td colspan="2"><img src="<?php echo $res['images3'];?>" alt="images" class="image" id="slider"></td></tr>
	<tr><td colspan="2"><img src="<?php echo $res['images4'];?>" alt="images" class="image" id="slider"></td></tr>
	



<?php
}
?>
</table>

<table class="table bg-dark" id="myTable">
		<tr><td class="border p-2">Home</td>
			<td class="border p-2">About</td></tr>
		<tr><td class="border p-2">Contect</td>
			<td class="border p-2">Review</td></tr>
		<tr><td class="border p-2">Policy</td>
			<td class="border p-2"><a href="login.php">Login</a></td></tr>
	</table>

<marquee class="bg-success p-3 text-light font-weight-bold">This website Developed Aks University MCA Student(2020-2022).</marquee>



<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>
