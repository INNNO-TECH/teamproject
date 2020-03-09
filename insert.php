<?php
include('db.php');
if(isset($_POST['username']) && isset($_POST['email'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	// echo $username."<br>";
	// echo $email;

	$sql = "INSERT INTO user (username,email,created_date,modified_date) VALUES ('$username','$email',now(),now())";
	mysqli_query($conn,$sql);
	header("location:index.php");
}

?>