<!DOCTYPE html>
<html>
<head>
	<title>bookstore</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		form label {
			display: block;
			margin-top: 8px;
			}
	</style>
</head>
<body>
	<ul class="menu">
		<li><a href="book_list.php">Manage Books</a></li>
		<li><a href="cat_list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<?php
include("confs/config.php");
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>
<form action="cat_update.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
<label for="name">Category Name</label>
<input type="text" name="name" id="name"
value="<?php echo $row['name'] ?>">
<label for="remark">Remark</label>
<textarea name="remark"
id="remark"><?php echo $row['remark'] ?></textarea>
<br><br>
<input type="submit" value="Update Category">
</form>

</body>
</html>