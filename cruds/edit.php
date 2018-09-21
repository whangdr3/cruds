<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$post = mysqli_real_escape_string($conn, $_POST['post']);	
	
	// checking empty fields
	if(empty($fullname) || empty($email) || empty($post)) {	
			
		if(empty($fullname)) {
			echo "<font color='red'>Full Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($post)) {
			echo "<font color='red'>Post field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE users SET fullname='$fullname',email='$email',post='$post' WHERE id=$id");
		
		echo"<div class='container text-center font-weight-bold'>";
		echo "<font color='green'>Data Updated successfully !";
		echo"</div>";

		header("Refresh:1; url=index.php");
	}
}
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

	<form action="" method="POST">

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Full Name</label>
			<input type="text" class="form-control" id="fullname" name="fullname" value="<?= $fullname; ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Email</label>
			<input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
		</div>

		<div class="form-group">
			<label class="font-weight-bold"><span class="text-danger">* </span>Post</label>
			<input  type="text" class="form-control"class="form-control" id="post" name="post" value="<?= $post; ?>">
		</div>

		<div class="form-group"><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></div>
		<div class="form-group"><input type="submit" name="update" value="Update" class="btn btn-success"></div>
	</form>

</div>
</body>
</html>
