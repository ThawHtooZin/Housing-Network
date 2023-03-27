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
  <?php include 'bootstrap.php';?>
  <body>
    <div class="container row">
      <?php
      include 'sidebar.php';
       ?>
      <div class="container mt-3 ps-5 col-10">
        <h1>User Data Table</h1>
        <a href="users/add.php" class="btn btn-success">+ Add</a>
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Role</th>
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
              <td><?php echo $datas['email'] ?></td>
              <td><?php if($datas['role'] == 1){echo "Admin";}else{echo "User";}; ?></td>
              <td><a href="users/edit.php?editid=<?php echo $datas['id']; ?>" class="btn btn-primary">Edit</a> <a href="users/delete.php?deleteid=<?php echo $datas['id']; ?>" class="btn btn-danger">Delete</a> </td>
            </tr>
            <?php
            }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
