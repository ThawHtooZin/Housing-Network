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
    <title>ProTech Realstate : Dashboard</title>
  </head>
  <?php include 'bootstrap.php';?>
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
                <a href="housing.php">view</a>
              </div>
            </div>
          </div>
          <!-- End About Housing -->
        </div>
        <!-- End Quick Access -->
        <br>
        <!-- Income Rates Chart -->
        <button data-bs-toggle="collapse" data-bs-target="#demo" class="btn btn-primary">Show The Profit / Income</button>
        <div id="demo" class="collapse card-body">
          <table class="table">
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </table>
        </div>
        <!-- End Income Rates Chart -->
      </div>
    </div>
  </body>
</html>
