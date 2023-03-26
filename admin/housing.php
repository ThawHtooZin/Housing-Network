<?php
  session_start();
  require '../config/connect.php';
  if(empty($_SESSION['logged_in'])){
    header('location:../login.php');
  }
  if($_SESSION['role'] != 1){
    header('location:../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>ProTech Realstate : Users</title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <body>
    <div class="container row">
      <?php
      include 'sidebar.php';
       ?>
      <div class="container mt-3 ps-5 col-10">
        <h1>Housing Data Table</h1>
        <a href="add.php" class="btn btn-success">+ Add</a>
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
          <?php
            $sql = "SELECT * FROM users";
            $data = $conn->query($sql);
            foreach ($data as $datas) {
            ?>
            <tr>
              <td><?php echo $datas['id']; ?></td>
              <td><?php echo $datas['username']; ?></td>
              <td><?php echo $datas['password'] ?></td>
              <td><a href="edit.php" class="btn btn-primary">Edit</a> <a href="delete.php" class="btn btn-danger">Delete</a> </td>
            </tr>
            <?php
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
