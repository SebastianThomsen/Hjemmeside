<?php
$servername = $current['db_host'];
$username = $current['db_user'];
$password = $current['db_password'];
$database = $current['db_name'];

// Opret forbindelse til din database
$conn = new mysqli($servername, $username, $password, $database);

// Tjek for forbindelsesfejl
if ($conn->connect_error) {
    die("Forbindelsesfejl: " . $conn->connect_error);
}

function hentAlleIndlæg() {
    global $conn; // Gør forbindelsen tilgængelig inde i funktionen

    // Set the character set to handle special characters
    $conn->set_charset("utf8");

    $query = "SELECT * FROM indlæg"; 

    $resultat = $conn->query($query);

    if ($resultat->num_rows > 0) {
        $indlæg = array();

        while ($row = $resultat->fetch_assoc()) {
            $indlæg[] = $row;
        }

        return $indlæg;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="poststyles.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div id="posts-container">
                <div class="header">
                    <h1>The Best Airsoft Out There!</h1>
                    <p>All posts will visible here</p>
                    <p></p>
                </div>

                <?php
                $alleIndlæg = hentAlleIndlæg();

                if ($alleIndlæg) :
                    foreach ($alleIndlæg as $indlæg) :
                ?>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $indlæg['titel']; ?></h4>
                            <p class="card-text"><?php echo $indlæg['indhold']; ?></p>
                            <a href="comments.php?post_id=<?php echo $indlæg['indlæg_id']; ?>" class="btn btn-primary">Kommentér</a>
                        </div>
                    </div>
                <?php
                    endforeach;
                else :
                ?>
                    <div class="alert alert-danger"><strong>No posts were found!</strong></div>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
</body>
</html>
