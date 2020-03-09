<?php
include('../db.php');
session_start();
$sql=mysqli_query($conn,"SELECT online_user.*,user.photo,user.name FROM online_user INNER JOIN user ON online_user.user_id=user.id WHERE online_user.user_id!='".$_SESSION['id']."'");
while($row=mysqli_fetch_assoc($sql))
{
	echo '<li class="list-group-item"><img src="img/'.$row['photo'].'" class="rounded-circle mr-2" width="35px" >'.$row['name'].'</li>';
}
?>