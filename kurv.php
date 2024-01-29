<?php require_once 'start.php'; ?>
<?php require_once BACKEND_AUTH . 'cart.php'; ?>
<?php
$db = Database::getInstance(); // replace this with your actual Database initialization
$cart = new Cart($db);
$userid = 1; // replace with actual user ID
$itemid = 1; // replace with actual item ID
$cart->addToCart($userid, $itemid);
?>
<?php require_once FRONTEND_INCLUDE . 'header.php'; ?>
<?php require_once FRONTEND_INCLUDE . 'navbar.php'; ?>
<?php require_once FRONTEND_INCLUDE . 'messages.php'; ?>
<?php require_once FRONTEND_PAGE . 'kurv.php'; ?>
<?php require_once FRONTEND_INCLUDE . 'footer.php'; ?>