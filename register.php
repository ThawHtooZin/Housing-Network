<?php
  session_start();
  require 'config/connect.php';
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech Realstate : Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  <?php
  include 'navbar.php';
  ?>
  <?php
  if($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(empty($username) || empty($password) || empty($email)){
      if(empty($username)){
        $usererror = "The username field is required";
      }
      if(empty($password)){
        $passerror = "The password field is required";
      }
      if(empty($email)){
        $emailerror = "The email field is required";
      }
    }else{
      $sql = "INSERT INTO users(username, password, email, role) VALUES ('$username', '$password', '$email', 0);";
      $register = $conn->query($sql);
      if(empty($register)){
        echo "<script>alert('Sorry an error accoured')</script>";
      }else{
        echo "<script>alert('successfully created an account')</script>";
        header('location:users/Index.php');
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
      }
    }
  }
  ?>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Register Page</h1>
            </div>
            <div class="card-body">
                <form action="register.php" method="post" autocomplete="off">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <br>
                    Already have an account? <a href="login.php">Login into your account</a>
                    <br>
                    <div class="row container">
                      <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
