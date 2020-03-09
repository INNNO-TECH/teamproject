<?php
include('db.php');
$sql4=mysqli_query($conn,"SELECT post_id FROM like_data");
$a="";
while($popular=mysqli_fetch_assoc($sql4))
{
	$a.=$popular['post_id'].",";
}
$c=substr($a, 0,-1);
echo $c."<hr>";
$b=explode(",", $c);
print_r($b);
echo "<hr>";
$d=array_count_values($b);
arsort($d);
print_r($d);
echo "<hr>";
foreach ($d as $key => $value) {
	$sql5=mysqli_query($conn,"SELECT * FROM post WHERE id='$key'");
	$popular1=mysqli_fetch_assoc($sql5);
	echo $popular1['title']."<br>";
}
?>