
<?php require_once 'app/backend/auth/cart.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurv</title>
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <?php if (!empty($_SESSION['shopping_cart'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Item Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php
require_once 'path/to/Database.php';
$connect = Database::getConnection();

// Start the session if it hasn't already been started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Connect to the database
$connect = mysqli_connect("localhost", "root", "", "DeFire");

// Check the connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Get the user ID from the session
$userid = $_SESSION['userid'];

// Query the database for the items in the cart
$sql = "SELECT * FROM cart WHERE user_id = $userid";
$result = $connect->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Loop through the results and display each item
    while($row = $result->fetch_assoc()) {
        echo "Item ID: " . $row["item_id"] . "<br>";
        echo "Quantity: " . $row["quantity"] . "<br>";
        echo "<hr>";
    }
} 
?>
<?php else: ?>
    <p>Your cart is empty.</p>
<?php endif; ?>
</body>
</html>