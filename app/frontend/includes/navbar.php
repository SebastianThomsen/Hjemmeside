

<!-- Første navigationslinje (vises altid) -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0D4D6D; height: 30px;">
  <a class= "navbar-brand" href="index.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 13px; padding: 9px; ">AIRSOFT FORUM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">

    <?php if ($user->isLoggedIn()) : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="profile.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 13px;">
            <span class="glyphicon glyphicon-user"></span> Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="logout.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 13px;">
            <span class="glyphicon glyphicon-log-out"></span> Logout
          </a>
        </li>
      </ul>
    <?php else : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-light" href="register.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 13px;">
            <span class="glyphicon glyphicon-user"></span> Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="login.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 13px;">
            <span class="glyphicon glyphicon-log-in"></span> Log-in
          </a>
        </li>
      </ul>
    <?php endif; ?>

  </div>
</nav>

<!-- Hvid linje -->
<hr style="background-color: #3d708a; height: 0,1px; margin: 0;">

<!-- Anden navigationslinje -->
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #0D4D6D; height: 50px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-light" href="index.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 18px;">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-light" href="forum.php" style="font-family: Arial, sans-serif; font-weight: bold; font-size: 18px;">FORUM</a>
    </li>
  </ul>
</nav>
