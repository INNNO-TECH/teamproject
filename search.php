<?php
include('db.php');
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$sql=mysqli_query($conn,"SELECT * FROM user WHERE name LIKE '%$name%'");
	while($row=mysqli_fetch_assoc($sql))
	{
		echo $row['name']."<br>";
	}
}
?>