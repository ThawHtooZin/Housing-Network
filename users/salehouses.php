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
    <title></title>
  </head>
  <?php
  include 'bootstrap.php';
  ?>
  <body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM housing WHERE sor='sale'");
    $stmt->execute();
    $data = $stmt->fetchall();
    $ownerstmt = $pdo->prepare('SELECT * FROM users');
    $ownerstmt->execute();
    $ownername = $ownerstmt->fetch(PDO::FETCH_ASSOC);
    include 'navbar.php';
    ?>
    <div class="container">
      <h1>Houses that are for Sale</h1>
      <div class="row">
          <?php
          foreach ($data as $datas) {
          ?>
          <div class="col">
          <div class="card" style="width:100%;">
            <div class="card-body text-center">
              <img src="<?php echo 'houseimages/'. $datas['houseimage'] ?>" alt="">
            </div>
            <div class="card-footer">
              <b>Owner: </b> <span><?php echo $ownername['username']; ?></span>
              <br>
              <b>Location:</b> <span> <?php echo $datas['location']; ?></span>
              <br>
              <b>Phone Number: </b> <span><?php echo $datas['phone_number']; ?></span>
              <br>
              <b>Deposite Fee: </b> <span><?php echo $datas['depositefee']; ?></span>
              <br>
              <b>Monthly Fee: </b> <span><?php echo $datas['monthlyfee']; ?></span>
              <br>
              <div class="text-center">
                <div class="row">
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php
        }
          ?>
        <div class="col">

        </div>
        <div class="col">

        </div>
      </div>
    </div>
  </body>
</html>
