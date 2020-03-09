<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<?php include('cdn.php'); ?>

</head>
<body style="background:#E9EBEE;">
<?php include ('nav.php');
if(!$_SESSION['id'])
{
	header("location:index.php");
}
 ?>
<div class="container-fluid" style="margin-top: 80px;">
	<div class="row">
		<div class="col-md-2"></div>


		<div class="col-md-5">
			
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$_SESSION['pid']=$id;
$sql1=mysqli_query($conn,"SELECT post.*,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.id='$id'");
$post=mysqli_fetch_assoc($sql1);
?>
			<div class="card mb-2">
				<div class="card-header bg-white">			
					<img src="img/<?php echo $post['photo']; ?>" width="30px" class="rounded-circle mr-1">
					<b><?php echo $post['name']; ?></b>				
					<div style="float: right;">
	<?php if($post['user_id']==$_SESSION['id']){ ?>
	<span class="badge badge-info ebtn" data-toggle="modal" data-target="#edit_Modal"
	post_id="<?php echo $post['id']; ?>"
	head="<?php echo $post['title']; ?>"
	description="<?php echo $post['description']; ?>"
	photo="<?php echo $post['post_photo']; ?>"
	>Edit</span>
	<a href="post/delete.php?id=<?php echo $post['id']; ?>"><span class="badge badge-warning">Delete</span></a>
	<?php } ?>
					</div>
				</div>
				<div class="card-body">
					<h6><?php echo $post['title']; ?></h6>
					<p class="text-justify">
						<?php echo $post['description']; ?>
					</p>
					<img src="img/<?php echo $post['post_photo']; ?>" width="100%;">
				</div>
<div class="card-footer react bg-white">
	<div class="media mb-2">
			  <div class="media-left">
			    <img src="img/3.jpg" class="media-object rounded-circle m-2" style="width:35px">
			  </div>
			  <div class="media-body">
<input type="" class="user_id" value="<?php echo $_SESSION['id']; ?>">
<input type="" class="post_id" value="<?php echo $id; ?>">
<textarea class="form-control comment" placeholder="Enter Comment"></textarea>
<button class="btn btn-info mt-2 cbtn">comment</button>

<div class="comment_area"></div>
			  </div>
	</div>				
</div>
			</div>
<?php } ?>

		</div>


		<div class="col-md-3"></div>
		<div class="col-md-2"></div>
	</div>
</div>
<script type="text/javascript">
	$('.cbtn').click(function(){
		var user_id=$('.user_id').val();
		var post_id=$('.post_id').val();
		var comment=$('.comment').val();
		$.ajax({
			url:"comment/insert.php",
			type:"POST",
			data:{user_id:user_id,post_id:post_id,comment:comment},
			success:function(data)
			{
				$('.comment').val("");
			}
		});
	});

	$(document).ready(function(){
$('.comment_area').load('comment/select.php');
comment_refresh();
	});

	function comment_refresh()
	{
	setTimeout(function(){
$('.comment_area').load('comment/select.php');
comment_refresh();	
	},1000)
	}
</script>
</body>
</html>