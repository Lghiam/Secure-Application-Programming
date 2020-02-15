<?php

  $msg = "";

  if(isset($_POST['submit'])){
    $con = new mysqli('localhost','root','','passwordHashing');

    //check connection
    if($con->connect_error){
      die("Connection failed: " . $con->connect_error);
    }

    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    $sql = $con->query("SELECT id, password FROM users WHERE email='$email'");

    //ensures input fields are not empty - information stored shouldn't be blank
    if(empty($email) || empty($password)){
      $msg = "Input fields should not be left empty!";
    }
    else{
      //ensures only letters and numbers can be used for input fields, except email which can have '@' and '.' in addition to letters and numbers
      if((!preg_match("/^[a-zA-Z0-9@.]*$/",$email)) || (!preg_match("/^[a-zA-Z0-9]*$/",$password))){
        $msg = "Only letters and numbers are allowed!";
      }
      else{
        if($sql->num_rows>0){
          $data = $sql->fetch_array();
          //verifys hashed password - if successful sends user to blog homepage
          if (password_verify($password, $data['password'])) {
            $_SESSION['email'] = $email;
            header("location:home.php");
          }
          else {
              $msg = "Please check your inputs!";
            }
        }
        else {
            $msg = "Please check your inputs!";
        }
      }
    }
  }

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
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
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="card">
        <img src="images/image1.png" class="card-img-top" alt="...">

        <div class="card-body p-3">
          <form action="login.php" method="post">
            <!--Form constraints-->
            <input class="form-control" maxlength="128" name=email type="email" placeholder="Email"><br>
            <input class="form-control" minlength="6" maxlength="128" name=password type="password" placeholder="Password"><br>
            <input class="form-control btn btn-primary" name=submit type="submit" value="Login"><br>
          </form>


          <center>
            <div class="mt-3">
              <a href="/project2/register.php">Need to register?</a>
            </div>

            <!--Displays error message-->
            <div class="mt-3">
              <p style="color: red;"><?php if ($msg != "") echo $msg . "<br><br>"; ?></p>
            </div>
          </center>

      </div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>
