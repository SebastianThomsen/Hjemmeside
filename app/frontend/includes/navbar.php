
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" type="text/css" href="navstyles.css">
</head>
<body>

<!-- Your existing navigation code goes here -->

</body>
</html>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forum.php">Tilbud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forum.php">El-artikler</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forum.php">Omkring os</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="forum.php">Kontakt</a>
        </li>
    </ul>

    <?php if ($user->isLoggedIn()) : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="profile.php">
            <span class="glyphicon glyphicon-user"></span> Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <span class="glyphicon glyphicon-log-out"></span> Logout
          </a>
        </li>
      </ul>
    <?php else : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="register.php">
            <span class="glyphicon glyphicon-user"></span> Register
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">
            <span class="glyphicon glyphicon-log-in"></span> Log-in
          </a>
        </li>
      </ul>
    <?php endif; ?>

  </div>
</nav>