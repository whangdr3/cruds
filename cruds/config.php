<?php

	$host='localhost';
	$user = 'root';
	$pass = '';
	$db = 'test';

	$conn = mysqli_connect($host, $user, $pass, $db); 
	
	if( $conn ) {
	     echo "<div class='pt-5'></div>";
	     // echo "<label style='color:red;'>Connection established.</label>";
		
	}else{
	     echo "Connection could not be established.<br />";
	}	
 ?>
