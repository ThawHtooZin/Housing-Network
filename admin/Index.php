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
    <title>ProTech Realstate : Home</title>
  </head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <body>
    <div class="container row">
      <?php
      include 'sidebar.php';
       ?>
      <div class="container ps-5 mt-3 col-10">
        <h1>Admin Page</h1>
        <br>
        <!-- Quick Access -->
        <h4 style="text-decoration:underline;"><li>Quick Access</li></h4>
        <br>
        <div class="row">
          <div class="col-4">
            <!-- About Users -->
            <div class="card">
              <div class="card-header">
                <h4>AboutUsers</h4>
              </div>
              <div class="card-body">
                <p>Page about the users that are using your website</p>
              </div>
              <div class="card-footer">
                <a href="users.php">view</a>
              </div>
            </div>
          </div>
          <!-- End About Users -->
          <!-- About Housing -->
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h4>AboutHousing</h4>
              </div>
              <div class="card-body">
                <p>Page about the housing that uploaded to your website</p>
              </div>
              <div class="card-footer">
                <a href="hosung.php">view</a>
              </div>
            </div>
          </div>
          <!-- End About Housing -->
        </div>
        <!-- End Quick Access -->
      </div>
      <!-- Income Rates Chart -->
      
      <!-- End Income Rates Chart -->
    </div>
  </body>
</html>
