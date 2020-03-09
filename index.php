<?php include('db.php'); ?>
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
		<h2 class="text-center my-4">CRUD with Procedure</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?php
				if(isset($_GET['id'])){ 
					$id=$_GET['id'];
					$sql1="SELECT * FROM user WHERE id='$id'";
					$query1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($query1);
					?>

					<form method="POST" action="update.php">

					<input type="hidden" name="id" value="<?php echo $row1['id']; ?>">

					<input type="text" name="username" placeholder="Enter Username" class="form-control" value="<?php echo $row1['username']; ?>"><br>
					<input type="email" name="email" placeholder="Enter Email" class="form-control" value="<?php echo $row1['email']; ?>"><br>
					<button class="btn btn-dark">UPDATE</button>
					</form>

				<?php }else{ ?>

					<form method="POST" action="insert.php">
					<input type="text" name="username" placeholder="Enter Username" class="form-control"><br>
					<input type="email" name="email" placeholder="Enter Email" class="form-control"><br>
					<button class="btn btn-dark">INSERT</button>
					</form>

				<?php }
				?>
				
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row mt-4">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Email</th>
						<th>Created_Date</th>
						<th>Modified_Date</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
					<?php
					$sql = "SELECT * FROM user";
					$query = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($query)){
						?>
						<tr>
						<td><?php echo $row['id']; ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['created_date']; ?></td>
						<td><?php echo $row['modified_date']; ?></td>
						<td><a href="?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a></td>
						<td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a></td>
						</tr>
						<?php
					}
					?>
					
				</table>
			</div>
		</div>
	</div>
</body>
</html>