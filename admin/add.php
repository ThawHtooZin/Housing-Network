<?php
  session_start();
  include '../config/connect.php';
  if(empty($_SESSION['logged_in'])){
    header('location:../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Data Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $sql = "INSERT INTO users  VALUES($username,$password)";
    $data = $conn->query($sql);
    ?>
    <div class="container mt-4">
      <div class="card">
        <div class="card-header">
          <h1 style="display:inline;">Add User Data</h1>
          <a href="index.php" class="btn btn-warning float-end"><< back </a>
        </div>
        <div class="card-body">
          <form action="add.php" method="post">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" class="form-control">
            <label>Password</label>
            <input type="text" name="password" placeholder="Password" class="form-control">
            <div class="row container">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
