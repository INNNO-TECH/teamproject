<?php
include('db.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		<h2 class="text-center my-4">CRUD with Ajax and jQuery</h2>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
					<input type="hidden" class="id" >
					<input type="" placeholder="Enter Book Name" class="form-control name"><br>
					<input type="" placeholder="Enter Author Name" class="form-control author"><br>
					<button class="btn btn-dark ibtn" onclick="insertData()">INSERT</button>
				    <button class="btn btn-dark ubtn" onclick="updateData()" style="display: none">UPDATE</button>
				
			</div>
			<div class="col-md-2"></div>
			
		</div>

		<div class="row col-mt-2">
			<div class="col-md-12 table_area">
			
			</div>
			
		</div>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			selectData();

		});
		function insertData() {
			var name=$('.name').val();
			var author=$('.author').val();
			$.ajax({
				url:"action.php",
				type:"POST",
				data:{name:name,author:author},
				success:function(data)
				{
					$('.name').val("");
					$('.author').val("");
					selectData();//after add,mention fun
				}
			});

		}

		function selectData(){
			$.ajax({
				url:"action.php",
				type:"POST",
				data:{select:1},
				success:function(data)
				{
					$('.table_area').html(data);
				}
			});
		}

		function deleteData(id)
		{
			$.ajax({
				url:"action.php",
				type:"POST",
				data:{id:id},
				success:function(data)
				{
					selectData();
				}
			})
		}


		function editData(eid)
		{
			// alert(eid);
			$.ajax({
				url:"action.php",
				type:"POST",
				data:{eid:eid},
				dataType:"json",
				success:function(data)
				{
					$('.id').val(data.id);
					$('.name').val(data.name);
					$('.author').val(data.author);
					$('.ibtn').hide();
					$('.ubtn').show();
				}

			});
		}

		function updateData()
		{
			var uid=$('.id').val();
			var uname=$('.name').val();
			var uauthor=$('.author').val();
			// alert(uid);
			// alert(uname);
			// alert(uauthor);
			$.ajax({
				url:"action.php",
				type:"POST",
				data:{uid:uid,uname:uname,uauthor:uauthor},
				success:function(data)
				{
					selectData();
					$('.ubtn').hide();
					$('.ibtn').show();
					$('.name').val("");
					$('.author').val("");
				}
			});
		}
	</script>

</body>
</html>