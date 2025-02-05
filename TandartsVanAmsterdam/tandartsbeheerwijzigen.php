<?php

global $pdo;
session_start();
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $geslacht = $_POST['geslacht'];
    $bsnnummer = $_POST['bsnnnummer'];
    $geboortedatum = $_POST['geboortedatum'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $adres = $_POST['adres'];
    $username = $_GET['username'];

    $sql = $pdo->prepare("UPDATE tandarts.login SET voornaam = :voornaam, achternaam = :achternaam, geslacht = :geslacht, bsnnummer = :bsnnummer, geboortedatum = :geboortedatum, telefoonnummer = :telefoonnummer, adres = :adres WHERE username = :username");

    $sql->execute([
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':geslacht' => $geslacht,
        ':bsnnummer' => $bsnnummer,
        ':geboortedatum' => $geboortedatum,
        ':telefoonnummer' => $telefoonnummer,
        ':adres' => $adres,
        ':username' => $username
    ]);

    if ($sql) {
        header('Location: tandartsbeheerdetails.php?message=Gebruiker details gewijzigd');
        exit;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profielbeheer | Tandarts</title>
    <link rel="stylesheet" href="tandartsbeheer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="profile-container">
    <h2>Update Gebruiker Details</h2>
    <form method="POST" class="w-100">
        <div class="form-group">
            <label for="voornaam">Voornaam:</label>
            <input type="text" id="voornaam" name="voornaam" class="form-control" value="<?php echo isset($_POST['voornaam']) ? $_POST['voornaam'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="achternaam">Achternaam:</label>
            <input type="text" id="achternaam" name="achternaam" class="form-control" value="<?php echo isset($_POST['achternaam']) ? $_POST['achternaam'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="geslacht">Geslacht:</label>
            <select id="geslacht" name="geslacht" class="form-control" required>
                <option value="">Selecteer geslacht</option>
                <option value="M" <?php echo (isset($_POST['geslacht']) && $_POST['geslacht'] == 'M') ? 'selected' : ''; ?>>Man</option>
                <option value="V" <?php echo (isset($_POST['geslacht']) && $_POST['geslacht'] == 'V') ? 'selected' : ''; ?>>Vrouw</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bsnnummer">BSN-nummer:</label>
            <input type="text" id="bsnnummer" name="bsnnnummer" class="form-control" value="<?php echo isset($_POST['bsnnnummer']) ? $_POST['bsnnnummer'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="geboortedatum">Geboortedatum:</label>
            <input type="date" id="geboortedatum" name="geboortedatum" class="form-control" value="<?php echo isset($_POST['geboortedatum']) ? $_POST['geboortedatum'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="telefoonnummer">Telefoonnummer:</label>
            <input type="text" id="telefoonnummer" name="telefoonnummer" class="form-control" value="<?php echo isset($_POST['telefoonnummer']) ? $_POST['telefoonnummer'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="adres">Adres:</label>
            <input type="text" id="adres" name="adres" class="form-control" value="<?php echo isset($_POST['adres']) ? $_POST['adres'] : ''; ?>" required>
        </div>
        <input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
        <br>
        <input type="submit" class="btn btn-primary" value="Bijwerken">
    </form>
</div>

</body>
</html>


