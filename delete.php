<?php
include('db.php');
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE id='$id'";
	mysqli_query($conn,$sql);
	header("location:index.php");
}
?>
