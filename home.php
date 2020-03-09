<!DOCTYPE html>
<html>
<head>
	<title>Lobelia</title>
	<?php include('cdn.php'); ?>

<style type="text/css">
	.side_left li,.side_right li{
		background:#F7F7F7;
	}
	.react{
		display: flex;
	}
	.react div{
		width: 33%;
		text-align: center;
	}
</style>
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
		<div class="col-md-2">
			<ul class="list-group side_left">
			  <li class="list-group-item">Cras justo odio</li>
			  <li class="list-group-item"><a href="friend.php">Friend</a></li>
			  <li class="list-group-item">Morbi leo risus</li>
			  <li class="list-group-item">Porta ac consectetur ac</li>
			  <li class="list-group-item">Vestibulum at eros</li>
			</ul>
		</div>


		<div class="col-md-5">
			<div class="card mb-3">
				<div class="card-header"><b>Create Posts</b></div>
				<div class="card-body">
					
				<div class="media">
				  <img src="img/<?php echo $user['photo']; ?>" width="50px;" class="mr-3 rounded-circle" alt="...">
				  <div class="media-body">
				    <textarea class="form-control" data-toggle="modal" data-target="#create_post_Modal"></textarea>
				  </div>
				</div>

				</div>
				<div class="card-footer bg-white">
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="fas fa-images mr-1"></i>Photo/Video</button>
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="fas fa-plus-circle text-white mr-1"></i>Create</button>
					<button class="btn btn-sm btn-info" data-toggle="modal" data-target="#create_post_Modal"><i class="far fa-smile mr-1"></i>Feeling/Activity</button>
				</div>
			</div>

<?php
$sql1=mysqli_query($conn,"SELECT post.*,user.name,user.photo FROM post INNER JOIN user ON post.user_id=user.id ORDER BY id DESC");
while($post=mysqli_fetch_assoc($sql1)){
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
					<div>
<span class="badge badge-success" id="like_area<?php echo $post['id'] ?>">
	<?php
$sql2=mysqli_query($conn,"SELECT * FROM like_data WHERE post_id='".$post['id']."'");
echo mysqli_num_rows($sql2);
	?>
</span>
<?php
$sql3=mysqli_query($conn,"SELECT * FROM like_data WHERE post_id='".$post['id']."' AND user_id='".$_SESSION['id']."'");
if(mysqli_num_rows($sql3)>0)
{ ?>
	<button class="btn btn-info unlike" value="<?php echo $post['id']; ?>">unlike</button>
<?php }else{ ?>
	<button class="btn btn-info like" value="<?php echo $post['id']; ?>">like</button>
<?php } ?>
					</div>
<div><a href="comment.php?id=<?php echo $post['id']; ?>"><i class="far fa-comment-alt mr-1"></i>Comment</a></div>
					<div><i class="fas fa-share mr-1"></i></i>Share</div>
				</div>
			</div>
<?php } ?>

		</div>


		<div class="col-md-3">
			<div class="alert" style="background:#fff;">
				<b>Popular Author</b><hr>
			<?php
$sql4=mysqli_query($conn,"SELECT post_id FROM like_data");
$a="";
while($popular=mysqli_fetch_assoc($sql4))
{
	$a.=$popular['post_id'].",";
}
$c=substr($a, 0,-1);
$b=explode(",", $c);
$d=array_count_values($b);
arsort($d);
foreach ($d as $key => $value) {
	$sql5=mysqli_query($conn,"SELECT post.*,user.photo FROM post INNER JOIN user ON post.user_id=user.id WHERE post.id='$key'");
	$popular1=mysqli_fetch_assoc($sql5);
			?>
			<div class="media border mb-2">
			  <div class="media-left">
			    <img src="img/<?php echo $popular1['photo']; ?>" class="media-object rounded-circle m-2" style="width:60px">
			  </div>
			  <div class="media-body">
			    <h6 class="media-heading mt-3"><?php echo $popular1['title']; ?></h6>
			  </div>
			</div>

	<?php } ?>


			</div>
		</div>
		<div class="col-md-2">
			<ul class="list-group side_right online_area" >
			  
			</ul>
		</div>
	</div>
</div>

<!-- ........Create Posts Modal................ -->
<div class="modal fade" id="create_post_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i>Create Posts</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="post/insert.php" enctype="multipart/form-data">
        	<input type="text" name="title" placeholder="Enter Title" class="form-control"><br>
        	<textarea name="description" placeholder="What's on your mind?" class="form-control"></textarea><br>
        	<b>Photo : </b><input type="file" name="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-registered mr-1"></i>Create</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- ........Edit Posts Modal................ -->
<div class="modal fade" id="edit_Modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i>Edit Posts</i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="post/insert.php" enctype="multipart/form-data">
        	<input type="" name="id" class="id">
        	<input type="text" name="title" placeholder="Enter Title" class="form-control title"><br>
        	<textarea name="description" placeholder="What's on your mind?" class="form-control description"></textarea><br>
        	<img src="" class="img-fluid photo">
        	<b>Photo : </b><input type="file" name="photo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary"><i class="fas fa-registered mr-1"></i>Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$('.ebtn').click(function(){
		var post_id=$(this).attr('post_id');
		var title=$(this).attr('head');
		var description=$(this).attr('description');
		var photo=$(this).attr('photo');
		$('.id').val(post_id);
		$('.title').val(title);
		$('.description').val(description);
		$('.photo').attr("src","img/"+photo);
	});

	$(document).ready(function(){
$('.online_area').load('online_user/online_user.php');
online_refresh();
	});

	function online_refresh()
	{
	setTimeout(function(){
$('.online_area').load('online_user/online_user.php');
online_refresh();	
	},1000)
	}

$(document).ready(function(){
	$('.like').click(function(){
		var id=$(this).val();
		$(this).toggleClass('like');
		if($(this).hasClass('like'))
		{
			$(this).text('Like');
		}else{
			$(this).text('Unlike');
			$(this).addClass('unlike');
		}
		$.ajax({
			url:"like_unlike/status.php",
			type:"POST",
			data:{id:id},
			success:function(data)
			{
				showLike(id);
			}
		});
	});

	$('.unlike').click(function(){
		var id=$(this).val();
		$(this).toggleClass('unlike');
		if($(this).hasClass('unlike'))
		{
			$(this).text('Unlike');
		}else{
			$(this).text('Like');
			$(this).addClass('like');
		}
		$.ajax({
			url:"like_unlike/status.php",
			type:"POST",
			data:{id:id},
			success:function(data)
			{
				showLike(id);
			}
		});
	});

	function showLike(id)
	{
		$.ajax({
			url:"like_unlike/show_like.php",
			type:"POST",
			data:{id:id},
			success:function(data)
			{
			$('#like_area'+id).html(data);
			}
		});
	}
});

</script>
</body>
</html>