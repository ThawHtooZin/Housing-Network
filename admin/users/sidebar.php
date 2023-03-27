<div class="container p-4 col-2 bg-dark">
  <h3 class="text-light"><a href="../Index.php" style="text-decoration:none;" class="text-light">ProTech Realstate</a></h3>
  <ul class="nav flex-column" style="margin-bottom:216px;">
    <li class="nav-item">
      <a class="nav-link text-light" href="../users.php">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="../housing.php">Housings</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="../profitincome.php">Profits / Income</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="../reports.php">Reports</a>
    </li>
  </ul>
  <div class="row">
    <p class="text-light text-center" style="padding-top: 216px; cursor:pointer;" onclick="document.getElementById('logout')" id="username"><?php echo $_SESSION['username']; ?></p><a href="../../logout.php" class="btn btn-light float-end hidden" id="logout">Logout</a>
  </div>
</div>
<style media="screen">
  .hidden{
    visibility: hidden;
  }
</style>
<script type="text/javascript">
  document.getElementById("username").onclick = displaylogout;
  function displaylogout() {
    document.getElementById('logout').classList.remove('hidden');
  }
</script>
