<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="salgstyles.css">
</head>
<body>
<div class="container">

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

    // Hent produkter fra databasen
    $sql = "SELECT item_id, name, description, price, image FROM produkter";
    $result = $conn->query($sql);

    // Loop gennem produkter og generer HTML
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
        echo '<div class="info-box">INKLUSIV LYSKILDE</div>';
        echo '<p>' . $row['description'] . '</p>';
        echo '<strong>' . $row['price'] . '.-</strong>';
        echo '<p>Lev. omk. tillægges</p>';
        echo '</div>';
    }

    // Luk forbindelsen til databasen
    $conn->close();
    ?>
</div>
</body>
</html>
