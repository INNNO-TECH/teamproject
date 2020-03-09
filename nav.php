<?php
include('db.php');
session_start();
$sql=mysqli_query($conn,"SELECT * FROM user WHERE id='".$_SESSION['id']."'");
$user=mysqli_fetch_assoc($sql);
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background:#4267B2;">
  <div class="container">
  <a class="navbar-brand" href="#">
    <img src="img/logo.png" width="30" height="30">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0" method="POST" action="search.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" name="name" aria-label="Search">
      <button class="btn btn-success">Search</button>
    </form>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link ml-5" href="#">
  <img src="img/<?php echo $user['photo']; ?>" width="30" height="30" class="rounded-circle">
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#"><?php echo $user['name']; ?>&nbsp;&nbsp;|<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" data-toggle="modal" data-target="#create_post_Modal"><i class="fas fa-plus-circle text-white mr-1"></i>Create<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users-cog text-white"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="auth/logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
        </div>
      </li>

    </ul>

  </div>

</div>
</nav>