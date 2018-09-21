<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="dist/css/bootstrap4.min.css">
</head>

<body>
<div class="container">
<?php 
	include("config.php");
?>
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

	<div class="pt-5"></div>

	<form action="" method="POST">
		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Full Name</label>
			<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter Full name">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Enter E-mail">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Post</label>
			<textarea class="form-control" type="text" class="form-control" id="post" name="post" placeholder="Your Text Here" rows="5"></textarea>
		</div>		

		<button type="submit" id="submit" name="submit" class="btn btn-success">Submit</button>
	</form>
</div>
</body>
</html>


<?php

if(isset($_POST['submit'])) {	
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$post = mysqli_real_escape_string($conn, $_POST['post']);
		
	// checking empty fields
	if(empty($fullname) || empty($email) || empty($post)) {
				
		if(empty($fullname)) {
			echo"<div class='container text-center'>";
				echo "<font color='red'>Full Name field is empty.</font><br/>";
			echo"</div>";
		}
		if(empty($email)) {
			echo"<div class='container text-center'>";
				echo "<font color='red'>E-mail field is empty.</font><br/>";
			echo"</div>";
		}
		if(empty($post)) {
			echo"<div class='container text-center'>";
				echo "<font color='red'>Post field is empty.</font><br/>";
			echo"</div>";
		}
			echo"<div class='container text-center font-weight-bold'>";
			echo "<br/><a href='index.php'>Go Back</a>";
			echo"</div>";
	} else {			
		$result = mysqli_query($conn, "INSERT INTO users(fullname,email,post) VALUES('$fullname','$email','$post')");

		echo"<div class='container text-center font-weight-bold'>";
		echo "<font color='green'>Data added successfully !";
		header("Refresh:1; url=index.php");
		echo"</div>";
	}
}
?>
