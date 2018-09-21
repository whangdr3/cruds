<?php

	include('config.php');

	$result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap4.min.css">
</head>
<body class="container">

	<div>
		<nav>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#.php">About</a>
				</li>
			</ul>	
		</nav>	
	</div>

	<div class="pt-5 pb-1">
		<a href="add.php" class="btn btn-primary">Add New Data</a>
	</div>

	<div>
		<table class="table table-bordered" style="width: 100%;">
			<tr class="thead-dark text-center">
				<th scope="col">ID</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Post</th>
				<th scope="col">Update</th>
			</tr>
		<?php 
		//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['fullname']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['post']."</td>";	
			echo "<td class='text-center'>
					<a class='btn btn-info' href=\"view.php?id=$res[id]\">View</a>
					<a class='btn btn-primary' href=\"edit.php?id=$res[id]\">Edit</a>
					<a class='btn btn-danger' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
		</table>
	</div>
</body>
</html>
