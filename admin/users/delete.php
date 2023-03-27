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
<?php

$id = $_GET['deleteid'];
$sql = "DELETE FROM users WHERE id=$id";
$data = $conn->query($sql);
header('location:../users.php');

 ?>
