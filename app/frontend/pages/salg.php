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
    // Array med produkter
    $products = [
        [
            'name' => 'Produkt 1',
            'image' => 'placeholder.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua.',
            'price' => 99
        ],
        [
            'name' => 'Produkt 2',
            'image' => 'placeholder.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua.',
            'price' => 49
        ],
        [
            'name' => 'Produkt 3',
            'image' => 'placeholder.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt',
            'price' => 79
        ],
        [
            'name' => 'Produkt 4',
            'image' => 'placeholder.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur 
            adipiscing elit, sed do eiusmod tempor incididunt 
            ut labore et dolore magna aliqua.',
            'price' => 79
        ]
    ];

    // Loop gennem produkter og generer HTML
    foreach ($products as $product) {
        echo '<div class="product">';
        echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
        echo '<div class="info-box">INKLUSIV LYSKILDE</div>';
        echo '<p>' . $product['description'] . '</p>';
        echo '<strong>' . $product['price'] . '.-</strong>';
        echo '<p>Lev. omk. tillægges</p>';
        echo '</div>';
    }
    ?>
</div>

</body>
</html>
