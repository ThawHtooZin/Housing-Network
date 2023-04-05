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
    <title>ProTech Realstate : Welcome</title>
  </head>
  <?php
  include 'bootstrap.php';
  ?>
  <body>
    <?php
    include 'navbar.php';
    ?>
  </body>
</html>
