<?php

global $pdo;
session_start();
include 'db.php';

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: loginTandarts.php');
    exit();
}

try {
    $sqlQuery = "SELECT * FROM tandarts.login WHERE username = :username";
    $stmt = $pdo->prepare($sqlQuery);
    $username = 'test@test.net';
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row === false) {
        throw new Exception("No user data found or query failed.");
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
} catch (Exception $e) {
    die("An error occurred: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profielbeheer | Tandarts</title>
    <link rel="stylesheet" href="tandartsbeheer.css">
</head>
<body>

    <div class="bar">
        <form method="POST">
    <button class="logout-button" name="logout">Uitloggen</button>
</form>
    </div>

    <div class="profile-container">
        
        <div class="profile-header">
            <div class="profile-image">
            </div>
            <div class="profile-name">
                <p><?php echo $row['voornaam']; ?> <?php echo $row['achternaam']; ?></p>
                <span>Profiel</span>
            </div>
        </div>

        <div class="profile-content">
            <div class="contact-info">
                <div class="personal-info">
                    <h3>Persoonlijke informatie</h3>
                    <p>Werkzaam bij Tandarts van Amsterdam</p>
                    <p>Geslacht: <?php echo $row['geslacht']; ?></p>
                    <p>BSN: <?php echo $row['bsnnummer']; ?></p>
                    <p>Geboortedatum: <?php echo $row['geboortedatum']; ?></p>
                    <p>Telefoonnummer: <?php echo $row['telefoonnummer']; ?></p>
                    <p>Adres: <?php echo $row['adres']; ?></p>
                </div>
            </div>

            <div class="additional-info">
                <h3>Wijzig gegevens</h3>
                <?php echo '<a class="edit-button" href="tandartsbeheerwijzigen.php?username=' . urlencode($username) . '">Wijzigen</a>'; ?>
                </div>
        </div>
    </div>

</body>
</html>

