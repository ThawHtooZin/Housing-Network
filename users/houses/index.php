<?php
  session_start();
  include '../../config/connect.php';
  if(empty($_SESSION['logged_in'])){
    header('location:../../login.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <?php
  include 'bootstrap.php';
  ?>
  <body>
    <?php
    include 'navbar.php';
    ?>
    <?php
      $user_id = $_SESSION['user_id'];
      $stmt = $pdo->prepare("SELECT * FROM housing WHERE owner=$user_id");
      $stmt->execute();
      $dataall = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              <h1>Houses</h1>
            </div>
            <div class="col">
              <div class="float-end">
                <div class="row">
                  <div class="col">
                    <h4>Show: </h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-primary" id="salebtn">Sales</a>
                  </div>
                  <div class="col">
                    <button type="button" class="btn btn-primary" id="rentbtn">Rents</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
            <div id="rent" style="display:none;">
              <table class="table table-striped" id="rent" style="display:block;">
                <tr>
                  <th>Id</th>
                  <th>Location</th>
                  <th>Phone Number</th>
                  <th>Deposite Fee</th>
                  <th>Monthly Fee</th>
                  <th>House Image</th>
                  <th>Action</th>
                </tr>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM housing WHERE owner=$user_id AND sor='rent'");
                $stmt->execute();
                $data = $stmt->fetchall();
                $id = 0;
                foreach ($data as $datas) {
                  $id++;
                  ?>
                <tr>
                  <td><?php echo $id; ?></td>
                  <td><?php echo $datas['location']; ?></td>
                  <td><?php echo $datas['phone_number']; ?></td>
                  <td><?php echo $datas['depositefee']; ?></td>
                  <td><?php echo $datas['monthlyfee']; ?></td>
                  <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View Image</button></td>
                  <th><a href="edit.php" class="btn btn-warning">Edit</a> <a href="delete.php" class="btn btn-danger">Delete</a> </th>
                </tr>
                <?php
              }
              ?>
              </table>
            </div>
          <div id="sale">
            <table class="table table-striped">
              <tr>
                <th>Id</th>
                <th>Location</th>
                <th>Phone Number</th>
                <th>Price</th>
                <th>House Image</th>
                <th>Action</th>
              </tr>
              <?php
              $stmt2 = $pdo->prepare("SELECT * FROM housing WHERE owner=$user_id AND sor='sale'");
              $stmt2->execute();
              $data2 = $stmt2->fetchall();
              $id2 = 0;
              foreach ($data2 as $datas2) {
                $id2++;
                ?>
              <tr>
                <td><?php echo $id2; ?></td>
                <td><?php echo $datas2['location']; ?></td>
                <td><?php echo $datas2['phone_number']; ?></td>
                <td><?php echo $datas2['price']; ?></td>
                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">View Image</button></td>
                <th><a href="edit.php" class="btn btn-warning">Edit</a> <a href="delete.php" class="btn btn-danger">Delete</a> </th>
              </tr>
              <?php
            }
            ?>
            </table>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
        <img src="../houseimages/<?php echo $datas['houseimage']; ?>" alt="">
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">

        function rentbtn(){
          document.getElementById('rent').style.display = "block";
          document.getElementById('sale').style.display = "none";
        }
        function salebtn(){
          document.getElementById('rent').style.display = "none";
          document.getElementById('sale').style.display = "block";
        }
        document.getElementById("salebtn").addEventListener("click", salebtn);
        document.getElementById("rentbtn").addEventListener("click", rentbtn);
        <?php
        if($dataall['sor'] ){

        }
        ?>
    </script>
  </body>
</html>
