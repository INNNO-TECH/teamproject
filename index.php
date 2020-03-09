<?php include ('action.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>kotoot</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h2 class="text-center my-4">CRUD with OOP</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">

			<?php
				if(isset($_GET['eid'])){
					$condition="id='".$_GET['eid']."'";
					$result=$obj->editData("about",$condition);
					$row=mysqli_fetch_assoc($result);
				?>
				<form method="POST" action="action.php">
					<input type="" name="uid" value="<?php echo $row['id']; ?>">
					<input type="text" name="uname" placeholder="Enter Book Name" class="form-control" value="<?php echo $row['name']; ?>"><br>
					<input type="text" name="uauthor" placeholder="Enter Author" class="form-control" value="<?php echo $row['author']; ?>"><br>
					<button class="btn btn-dark">UPDATE</button>
				</form>
			<?php }else{ ?>
				<form method="POST" action="action.php">
					<input type="text" name="name" placeholder="Enter Book Name" class="form-control"><br>
					<input type="text" name="author" placeholder="Enter Author" class="form-control"><br>
					<button class="btn btn-dark">INSERT</button>
				</form>
			<?php }	?>

				
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row mt-4">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Book Name</th>
						<th>Author</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>

					<?php
						$result=$obj->selectData("about");
						while ($row=mysqli_fetch_assoc($result)){
					?>

						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['author']; ?></td>
							<td><a href="?eid=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>
							<td><a href="action.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>