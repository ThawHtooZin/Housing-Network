<?php
  session_start();
  require 'config/connect.php';
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProTech Realstate : Login</title>
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
    if(empty($username) || empty($password)){
      if(empty($username)){
        $usererror = "The Username Field Is Required";
      }
      if(empty($password)){
        $passerror = "The Password Field Is Required";
      }
    }else{
      $stmt = $pdo->prepare("SELECT * FROM users WHERE username='$username'");
      $stmt->execute();
      $auth = $stmt->fetch(PDO::FETCH_ASSOC);
      if(empty($auth)){
        echo "<script>alert('Invalid Cridential');</script>";
      }else{
          if($password == $auth['password']){
            if($auth['role'] == 1){
              header('location:admin/index.php');
              $_SESSION['username'] = $auth['username'];
              $_SESSION['user_id'] = $auth['id'];
              $_SESSION['logged_in'] = true;
              $_SESSION['role'] = 1;
            }else{
              header('location:users/index.php');
              $_SESSION['username'] = $auth['username'];
              $_SESSION['user_id'] = $auth['id'];
              $_SESSION['logged_in'] = true;
            }
        }
      }
    }
  }
   ?>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Login Page</h1>
            </div>
            <div class="card-body">
                <form action="login.php" method="post"autocomplete="off">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <br>
                    No Account? <a href="register.php">Register a new account</a>
                    <br>
                    <div class="row container">
                      <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
