<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <link rel="stylesheet" type="text/css" href="navstyles.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle search form visibility
      $(".toggle-search").click(function() {
        $(".search-form").toggle();
        $(".search-input").focus(); // Automatically focus on the input field when shown
      });

      // Handle profile icon dropdown
      $(".profile-icon-link").click(function(e) {
        e.preventDefault();
        $(".dropdown-menu").toggle();
      });
    });
  </script>
</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container"> <!-- Added a container for better organization -->
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
            <a class="nav-link" href="salg.php">El-artikler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Omkring os</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="forum.php">Kontakt</a>
          </li>
        </ul>
        <div class="search-form" style="display: none;">
          <form class="form-inline ml-auto">
            <input class="form-control mr-sm-2 search-input" type="search" placeholder="Search" aria-label="Search">
          </form>
        </div>
        <button class="toggle-search my-2 my-sm-0">
          <img src="loupe.png" alt="Search" width="20" height="20">
        </button>
        <button class="toggle-cart my-2 my-sm-0">
          <a href="kurv.php">
          <img src="shopping-bag.png" alt="Shopping Cart" width="23" height="23">
          </a>
        </button>
        <?php if (isset($user) && $user->isLoggedIn()) : ?>
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
          <div class="dropdown ml-auto">
            <a href="#" class="profile-icon-link">
              <img src="user.png" alt="Profile Icon" width="23" height="23" class="profile-icon">
            </a>
            <div class="dropdown-menu" aria-labelledby="userDropdown" style="display: none;">
              <a class="dropdown-item" href="register.php">Register</a>
              <a class="dropdown-item" href="login.php">Log-in</a>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </nav>

</body>
</html>
