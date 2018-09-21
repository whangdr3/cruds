<?php
	include_once("config.php");
?>
<?php

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$fullname = $res['fullname'];
	$email = $res['email'];
	$post = $res['post'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap4.min.css">
</head>
<body class="container">
<div class="container">

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
	
	<diV class="pt-5"></diV>

	<div>
		<table class="table table-bordered p-5">
				<tr>
					<th class="bg-success text-white align-middle text-right" style="width: 10vw; height:8vh">ID</th>
					<td class="align-middle" style="color:#808080"><?php echo $id; ?></td>
				</tr>
				<tr>
					<th class="bg-success text-white align-middle text-right" style="width: 10vw; height:8vh">Full Name</th>
					<td class="align-middle"  style="color:#808080"><?php echo $fullname; ?></td>
				</tr>
				<tr>
					<th class="bg-success text-white align-middle text-right" style="width: 10vw; height:8vh">Email</th>
					<td class="align-middle"  style="color:#808080"><?php echo $email; ?></td>
				</tr>
				<tr>
					<th class="bg-success text-white align-middle text-right" style="width: 10vw; height:8vh">Post</th>
					<td class="align-middle"  style="color:#808080"><?php echo $post; ?></td>
				</tr>
		</table>
	</div>

</div>
</body>
</html>
