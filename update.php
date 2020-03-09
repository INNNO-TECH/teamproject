<?php
include('db.php');
if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])){
	$id = $_POST['id'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$sql = "UPDATE user SET  username = '$username',email = '$email',modified_date = now() WHERE id= '$id'";
	mysqli_query($conn,$sql);
	header("location:index.php");
}
?>