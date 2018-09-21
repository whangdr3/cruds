<?php
include("config.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

header("Refresh:1; url=index.php");
?>

