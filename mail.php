<?php
if(isset($_POST))
{
	$to_mail=$_POST['to_mail'];
	$from_mail="FROM: ".$_POST['from_mail'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	mail($to_mail,$subject,$message,$from_mail);
	header("location:friend.php");
}
?>