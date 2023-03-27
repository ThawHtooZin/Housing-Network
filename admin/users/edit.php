<?php
  session_start();
  require '../../config/connect.php';
  if(empty($_SESSION['logged_in'])){
    header('location:../../login.php');
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
  <?php include '../bootstrap.php';?>
  <body>
    <?php
    $id = $_GET['editid'];
    if($_POST){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $roledata = $_POST['role'];
      if(empty($username) || empty($password) || empty($email)){
        if(empty($username)){
          $usererror = "The username field is reqired";
        }
        if(empty($password)){
          $passerror = "The password field is reqired";
        }
        if(empty($email)){
          $emailerror = "The email field is required";
        }
      }else{
        $sql = "UPDATE users SET username='$username', password='$password', email='$email', role='$roledata' WHERE id=$id";
        $data = $conn->query($sql);
        header('location:../users.php');
      }
    }
    ?>
    <div class="container row">
      <?php
      include 'sidebar.php';
       ?>
      <div class="container mt-3 ps-5 col-10">
        <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h1 style="display:inline;">Edit User Data</h1>
              <a href="../users.php" class="btn btn-warning float-end"><< back </a>
            </div>
            <?php
              $datasql = "SELECT * FROM users WHERE id=$id";
              $userdata = $conn->query($datasql);
              foreach ($userdata as $userdatas) {
             ?>
            <div class="card-body">
              <form action="edit.php?editid=<?php echo $id; ?>" method="post" autocomplete="off">
                <label>Username</label>
                <input type="text" name="username" placeholder="Username" class="form-control" value="<?php echo $userdatas['username']; ?>">
                <label>Password</label>
                <input type="text" name="password" placeholder="Password" class="form-control" value="<?php echo $userdatas['password']; ?>">
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $userdatas['email']; ?>">
                <label>Role</label>
                <select class="form-control" name="role">
                  <option value="0" <?php if($userdatas['role'] == 0){echo 'SELECTED';}; ?>>User</option>
                  <option value="1" <?php if($userdatas['role'] == 1){echo 'SELECTED';}; ?>>Admin</option>
                </select>
                <br>
                <div class="row container">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <?php
            }
             ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
