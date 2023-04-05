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
        <h1>Housing Data Table</h1>
        <a href="add.php" class="btn btn-success">+ Add</a>
        <table class="table">
          <tr>
            <th>ID</th>
            <th>Owner</th>
            <th>Location</th>
            <th>Phone Number</th>
            <th>Sale Or Rent</th>
            <th>Deposite Fee</th>
            <th>Monthly Fee</th>
            <th>House Image</th>
            <th>Action</th>
          </tr>
          <?php
            $sql = "SELECT * FROM housing";
            $data = $conn->query($sql);
            foreach ($data as $datas) {
              $ownerid = $datas['owner'];
              $sql2 = "SELECT * FROM users WHERE id=$ownerid";
              $data2 = $conn->query($sql2);
              foreach($data2 as $datas2){
            ?>
            <tr>
              <td><?php echo $datas['id']; ?></td>
              <td><?php echo $datas2['username']; ?></td>
              <td><?php echo $datas['location']; ?></td>
              <td><?php echo $datas['phone_number']; ?></td>
              <td><?php echo $datas['sor']; ?></td>
              <td><?php echo $datas['depositefee']; ?></td>
              <td><?php echo $datas['monthlyfee']; ?></td>
              <td>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">House Image</button>
              </td>
              <td><a href="edit.php" class="btn btn-primary">Edit</a> <a href="delete.php" class="btn btn-danger">Delete</a> </td>
            </tr>
            <?php
            }
            }
          ?>
        </table>
      </div>
    </div>
    <!-- Images Model -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="model-content">
          <div class="model-body">
            <img src="<?php echo $datas['houseimage'];?>" alt="" style="width:100%;">
          </div>
        </div>
      </div>
    </div>
    <!-- Image Model -->
  </body>
</html>
