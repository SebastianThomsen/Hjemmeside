<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="product_detailsstyles.css">
    <title>Product Details</title>
    <script>
        function changeQuantity(amount) {
            var quantityInput = document.getElementById('quantity');
            quantityInput.value = parseInt(quantityInput.value) + amount;
            validateQuantity(quantityInput);
        }

        function validateQuantity(input) {
            if (parseInt(input.value) < 1) {
                input.value = 1;
            }
        }
    </script>
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
            echo '<div class="quantity-section">';
            echo '<label for="quantity"></label>';
            echo '<div class="quantity-controls">';
            echo '<button onclick="changeQuantity(-1)">-</button>';
            echo '<input type="number" id="quantity" name="quantity" value="1" min="1" oninput="validateQuantity(this)">';
            echo '<button onclick="changeQuantity(1)">+</button>';
            echo '</div>';
            echo '</div>';
            echo '<button onclick="addToCart(' . $product['item_id'] . ', document.getElementById(\'quantity\').value)">Tilføj til kurv</button>';
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
