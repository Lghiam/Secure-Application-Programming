<?php

  $msg = "";
  $msg2 = "";

  if(isset($_POST['submit'])){
    $con = new mysqli('localhost','root','','passwordHashing');

    //check connection
    if($con->connect_error){
      die("Connection failed: " . $con->connect_error);
    }

    //real_escape_string used to create legal SQL string that can be used in an SQL statement
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $cPassword = $con->real_escape_string($_POST['cPassword']);

    $query = " select * from users where email = '$email'";
    $result = mysqli_query($con, $query);
    $num = mysqli_num_rows($result);

    //checks if an email address is already registered by another user - displays error message which does not reveal sensitive information (e.g. Email address exists in database)
    if($num == 1){
      $msg = "Please check your inputs!";
    }
    else{
      //ensures input fields are not empty
      if(empty($name) || empty($email || empty($password) || empty($cPassword))){
        $msg = "Input fields should not be left empty!";
      }
      else{
        //ensures password = confirm password
        if ($password != $cPassword){
          $msg = "Please check your inputs!";
        }
        else {
          //ensures only letters and numbers can be used for input fields, except email which can have '@' and '.' in addition to letters and numbers
          if((!preg_match("/^[a-zA-Z0-9]*$/",$name)) || (!preg_match("/^[a-zA-Z0-9]*$/",$password)) || (!preg_match("/^[a-zA-Z0-9]*$/",$cPassword)) || (!preg_match("/^[a-zA-Z0-9@.]*$/",$email))){
            $msg = "Only letters and numbers are allowed!";
          }
          else{
            //password hashed using BCRYPT
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $con->query("insert into users(name,email,password) values ('$name', '$email', '$hash')");
            $msg2 = "You have been registered!";
          }
        }
      }
    }
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
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6 mx-auto ">
        <div class="card">
        <img src="images/image1.png" class="card-img-top" alt="...">
        <div class="card-body p-3">

        <form action="register.php" method="post">
          <!--Form constraints-->
          <input class="form-control" minlength="3" maxlength="50" name="name" placeholder="Name"><br>
          <input class="form-control" name="email" maxlength="128" type="email" placeholder="Email"><br>
          <input class="form-control" minlength="6" maxlength="128" name="password" type="password" placeholder="Password"><br>
          <input class="form-control" minlength="6" maxlength="128" name="cPassword" type="password" placeholder="Confirm Password"><br>
          <input class="form-control btn btn-primary" name="submit" type="submit" value="Register"><br>
       </form>


      <center>
         <div class="mt-3">
           <a href="/project2/login.php">Already have an account?</a>
         </div>

         <!--Displays php message-->
         <div class="mt-3">
           <p style="color: red;"><?php if ($msg != "") echo $msg . "<br><br>"; ?></p>
           <p style="color: green;"><?php if ($msg2 != "") echo $msg2 . "<br><br>"; ?></p>
         </div>
     </center>

      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>
