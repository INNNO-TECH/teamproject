<?php
include('../db.php');
session_start();
mysqli_query($conn,"DELETE FROM online_user WHERE user_id='".$_SESSION['id']."'");
unset($_SESSION['id']);
header("location:../index.php");
?>