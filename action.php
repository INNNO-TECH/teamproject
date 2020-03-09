<?php
include('db.php');
if (isset($_POST['name']) && isset($_POST['author']))
{
	$name=$_POST['name'];
	$author=$_POST['author'];
	$sql="INSERT INTO about (name,author) VALUES('$name','$author')";
	mysqli_query($conn,$sql);
}

if(isset($_POST['select']))
{
	$sql="SELECT*FROM about";
	$query=mysqli_query($conn,$sql);
	$data="";
	$data.='<table class="table table-bordered table-striped">
					<tr>
						<th>ID</th>
						<th>Book Name</th>
						<th>Author Name</th>
						<th>Edit</th>
						<th>Delete</th>

					</tr>';
	while($row=mysqli_fetch_assoc($query))
	{
		$data.='<tr>
					<td>'.$row['id'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['author'].'</td>
					<td><button class="btn btn-info" onclick="editData('.$row['id'].')">Edit</button></td>
					<td><button class="btn btn-dark" onclick="deleteData('.$row['id'].')">Delete</button></td>
				</tr>';
	}
	$data.='</table>';
	echo $data;

}

if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$sql="DELETE FROM about WHERE id='$id'";
	mysqli_query($conn,$sql);
}

if(isset($_POST['eid']))
{
	$id=$_POST['eid'];
	$sql="SELECT*FROM about WHERE id='$id'";
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($query);
	echo json_encode($row); //array change to json coz cannot output the whole array to echo
}

if(isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['uauthor']))
{
	$id=$_POST['uid'];
	$uname=$_POST['uname'];
	$uauthor=$_POST['uauthor'];
	$sql="UPDATE about SET name='$uname',author='$uauthor' WHERE id='$id'";
	mysqli_query($conn,$sql);
}
?>