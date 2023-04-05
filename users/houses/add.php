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

    if($_POST){
      $file = 'houseimages/'.($_FILES['image']['name']);
      $imageType = pathinfo($file, PATHINFO_EXTENSION);

      if($imageType != 'jpg' && $imageType != 'jpeg' && $imageType != 'png'){
        echo "<script>alert('Image should be jpg, jpeg, png');</script>";
      }else{
        $image = $_FILES['image']['name'];
        $location = $_POST['location'];
        $phonenumber = $_POST['phonenumber'];
        $sor = $_POST['sor'];
        $price = $_POST['price'];
        $depositefee = $_POST['depositefee'];
        $monthlyfee = $_POST['monthlyfee'];
        $owner = $_SESSION['user_id'];

        move_uploaded_file($_FILES['image']['name'], $file);
        if($sor == 'rent'){
          $stmt = $pdo->prepare("INSERT INTO housing(owner,location,phone_number,sor,depositefee,monthlyfee,houseimage) VALUES(:owner ,:location, :phonenumber, :sor, :depositefee, :monthlyfee, :image)");

          $result = $stmt->execute(
            array(':owner'=>$owner, ':location'=>$location, ':phonenumber'=>$phonenumber, ':sor'=>$sor, ':depositefee'=>$depositefee,':monthlyfee'=>$monthlyfee,':image'=>$image)
          );
        }elseif($sor == 'sale'){
          $stmt = $pdo->prepare("INSERT INTO housing(owner,location,phone_number,sor,price,houseimage) VALUES(:owner ,:location, :phonenumber, :sor, :price, :image)");

          $result = $stmt->execute(
            array(':owner'=>$owner, ':location'=>$location, ':phonenumber'=>$phonenumber, ':sor'=>$sor, ':price'=>$price,':image'=>$image)
          );
        }
      }
    }
    ?>
    <div class="container">
      <div class="card">
        <div class="card-header">
          <h1>Upload an house</h1>
        </div>
        <div class="card-body">
          <form action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <label>Location</label>
            <input type="text" name="location" placeholder="Location" class="form-control">
            <label>Phone Number</label>
            <input type="text" name="phonenumber" placeholder="Phone Number" class="form-control">
            <label>Sale Or Rent</label>
            <select class="form-control" name="sor" onchange="changed()">
              <option value="sale">Sale</option>
              <option value="rent">Rent</option>
            </select>
            <div id="price">
              <label>Price</label>
              <input type="text" name="price" placeholder="Price" class="form-control">
            </div>
            <div id="depositefee">
              <label>Deposite Fee</label>
              <input type="text" name="depositefee" placeholder="Deposite Fee" class="form-control">
            </div>
            <div  id="monthlyfee">
              <label>Monthly Fee</label>
              <input type="text" name="monthlyfee" placeholder="Monthly Fee" class="form-control">
            </div>
            <label>House Image</label>
            <input type="file" name="image" placeholder="Select an Image" class="form-control">
            <br>
            <div class="row container">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      var changenum = 0;
      var price = document.getElementById("price");
      var depositefee = document.getElementById("depositefee");
      var monthlyfee = document.getElementById("monthlyfee");
      price.style.display = 'block';
      depositefee.style.display = 'none';
      monthlyfee.style.display = 'none';
      console.log(changenum);
        function changed(){

          if(changenum == 0){
            changenum = 1;
            console.log(changenum);
            price.style.display = 'none';
            depositefee.style.display = 'block';
            monthlyfee.style.display = 'block';
          }else{
            changenum = 0;
            console.log(changenum);
            price.style.display = 'block';
            depositefee.style.display = 'none';
            monthlyfee.style.display = 'none';

          }
        }
    </script>
  </body>
</html>
