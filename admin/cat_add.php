<?php
include("confs/config.php");
$name = $_POST['name'];
$remark = $_POST['remark'];
// $test = $_REQUEST;
// var_dump($test) ;
$sql = "INSERT INTO categories (name, remark, created_date,
modified_date) VALUES ('$name', '$remark', now(), now())";
mysqli_query($conn, $sql);
header("location: cat_list.php");
?>