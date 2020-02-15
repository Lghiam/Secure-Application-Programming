<?php

session_start();
//Automatic logout after 15 minutes of inactivity
$time = time();
 if (isset($_SESSION['logged_in_user']) && ($time - $_SESSION['logged_in_user'] > 900)) {
   session_destroy();
   session_unset();
   header('location: login.php');
 }
 else {
   //Reset activity timer
   $_SESSION['logged_in_user'] = time();
 }

 ?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
.nav-item{
  margin-left: 15px;
}
body {
  background-color: #C9DFEF;
}
.container {
  background-color: #C9DFEF;
}
</style>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-3">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Blogs<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Create Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>


  <!--Hardcoded example of the blog homepage-->
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto my-5">
        <div class="card p-5">
          <center>
            <h3>Recent Blogs</h3>
            <br>
          </center>
          <div class="my-3">
            <h4>Blog Title 1</h4>
            <br>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper ante dolor, eget pharetra elit ornare quis. Quisque pretium aliquet dui, et condimentum orci rhoncus non.
              Suspendisse potenti. Nulla convallis vehicula nisl, ac varius lorem finibus vel. Quisque libero lacus, vehicula eu sagittis eu, imperdiet in nibh. Duis ac leo in lorem lacinia auctor.
              Etiam hendrerit ante sapien, a molestie erat convallis eleifend. Pellentesque libero odio, fringilla quis nibh eget, gravida facilisis justo. Curabitur tincidunt,
              velit a luctus egestas, est felis rutrum orci, ac facilisis massa sapien eu tellus. Duis eu condimentum lacus. Quisque blandit, erat sed bibendum interdum, turpis nisl tristique neque,
              ut viverra augue libero nec ipsum. Maecenas fermentum molestie imperdiet.
            </p>
            <small> <i>John Doe</i> </small>
            <br>  <br>
            <hr>
          </div>

          <div class="my-3">
            <h4>Blog Title 2</h4>
            <br>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper ante dolor, eget pharetra elit ornare quis. Quisque pretium aliquet dui, et condimentum orci rhoncus non.
              Suspendisse potenti. Nulla convallis vehicula nisl, ac varius lorem finibus vel. Quisque libero lacus, vehicula eu sagittis eu, imperdiet in nibh. Duis ac leo in lorem lacinia auctor.
              Etiam hendrerit ante sapien, a molestie erat convallis eleifend. Pellentesque libero odio, fringilla quis nibh eget, gravida facilisis justo. Curabitur tincidunt,
              velit a luctus egestas, est felis rutrum orci, ac facilisis massa sapien eu tellus. Duis eu condimentum lacus. Quisque blandit, erat sed bibendum interdum, turpis nisl tristique neque,
              ut viverra augue libero nec ipsum. Maecenas fermentum molestie imperdiet.
            </p>
            <small> <i>Jane Doe</i> </small>
            <br>  <br>
            <hr>
          </div>

          <div class="my-3">
            <h4>Blog Title 3</h4>
            <br>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper ante dolor, eget pharetra elit ornare quis. Quisque pretium aliquet dui, et condimentum orci rhoncus non.
              Suspendisse potenti. Nulla convallis vehicula nisl, ac varius lorem finibus vel. Quisque libero lacus, vehicula eu sagittis eu, imperdiet in nibh. Duis ac leo in lorem lacinia auctor.
              Etiam hendrerit ante sapien, a molestie erat convallis eleifend. Pellentesque libero odio, fringilla quis nibh eget, gravida facilisis justo. Curabitur tincidunt,
              velit a luctus egestas, est felis rutrum orci, ac facilisis massa sapien eu tellus. Duis eu condimentum lacus. Quisque blandit, erat sed bibendum interdum, turpis nisl tristique neque,
              ut viverra augue libero nec ipsum. Maecenas fermentum molestie imperdiet.
            </p>
            <small> <i>David James</i> </small>
            <br>  <br>
            <hr>
          </div>

          <div class="my-3">
            <h4>Blog Title 4</h4>
            <br>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper ante dolor, eget pharetra elit ornare quis. Quisque pretium aliquet dui, et condimentum orci rhoncus non.
              Suspendisse potenti. Nulla convallis vehicula nisl, ac varius lorem finibus vel. Quisque libero lacus, vehicula eu sagittis eu, imperdiet in nibh. Duis ac leo in lorem lacinia auctor.
              Etiam hendrerit ante sapien, a molestie erat convallis eleifend. Pellentesque libero odio, fringilla quis nibh eget, gravida facilisis justo. Curabitur tincidunt,
              velit a luctus egestas, est felis rutrum orci, ac facilisis massa sapien eu tellus. Duis eu condimentum lacus. Quisque blandit, erat sed bibendum interdum, turpis nisl tristique neque,
              ut viverra augue libero nec ipsum. Maecenas fermentum molestie imperdiet.
            </p>
            <small> <i>John Smith</i> </small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
