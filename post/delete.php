<?php
include('../db.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	mysqli_query($conn,"DELETE FROM post WHERE id='$id'");
	header("location:../home.php");
}
?>