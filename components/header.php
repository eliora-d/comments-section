<div class="header-container">
  <h1>Comment Section</h1>
  <form class="navbar" method="GET">
      <button class="navbar-menu navbar-left" name="page" value="components/home.php">Home</button>
      <?php 
        if(isset($_SESSION['id'])) {
      ?>
        <p class="navbar-menu navbar-middle" style="text-align:center" name="page">Hi, <?= $_SESSION['username'] ?></p>
        <button class="navbar-menu navbar-right" name="page" value="controllers/controller_logout.php">Logout</button>
      <?php
        } else {
      ?>
        <button class="navbar-menu navbar-middle" name="page" value="components/register.php">Register</button>
        <button class="navbar-menu navbar-right" name="page" value="components/login.php">Login</button>
      <?php
        }
      ?>
  </form>
</div>