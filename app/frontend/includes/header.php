<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php appName(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="headerstyles.css">
  <style>

  </style>
</head>

<body>


<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Fri fragt ved køb over 400.- </h1>
 
  <?php if ($user->isLoggedIn()) : ?>
    <h3 align="right">Hello, <?php echo $user->data()->name; ?></h3>
  <?php endif; ?>
</div>