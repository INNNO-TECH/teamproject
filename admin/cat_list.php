<?php include("confs/auth.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>bookstore</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Category List</h1>
<ul class="menu">
		<li><a href="book_list.php">Manage Books</a></li>
		<li><a href="cat_list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
<?php
include("confs/config.php");
$result = mysqli_query($conn, "SELECT * FROM categories");
?>
<ul>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<li title="<?php echo $row['remark'] ?>">
[ <a href="cat_del.php?id=<?php echo $row['id'] ?>" class="del">del</a> ]
[ <a href="cat_edit.php?id=<?php echo $row['id'] ?>">edit</a> ]
<?php echo $row['name'] ?>
</li>
<?php endwhile; ?>
</ul>
<a href="cat_new.php" class="new">New Category</a>

</body>
</html>