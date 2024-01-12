<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="product_detailsstyles.css">
    <title>Product Details</title>
</head>
<body>
    <?php
    // Opret forbindelse til databasen (erstat disse oplysninger med dine egne)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "DeFire";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Tjek forbindelsen
    if ($conn->connect_error) {
        die("Forbindelse mislykkedes: " . $conn->connect_error);
    }

    // Hent produktets detaljer baseret på item_id fra URL'en
    if(isset($_GET['item_id'])) {
        $item_id = $_GET['item_id'];
        $sql = "SELECT * FROM produkter WHERE item_id = $item_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            // Vis produktets detaljer her
            echo '<div class="product-details">';
            echo '<div class="product-image"><img src="' . $product['image'] . '" alt="' . $product['name'] . '"></div>';
            echo '<div class="details">';
            echo '<h2>' . $product['name'] . '</h2>';
            echo '<p>' . $product['description'] . '</p>';
            echo '<strong>' . $product['price'] . '.-</strong>';
            echo '<p>Lev. omk. tillægges</p>';
            echo '<button onclick="addToCart(' . $product['item_id'] . ')">Tilføj til kurv</button>';
            echo '</div>';
            echo '</div>';
        } else {
            echo 'Produktet blev ikke fundet.';
        }
    } else {
        echo 'Ingen produkt-id blev angivet.';
    }

    // Luk forbindelsen til databasen
    $conn->close();
    ?>
</body>
</html>
