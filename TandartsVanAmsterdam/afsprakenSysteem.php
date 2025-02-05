<?php
require 'db.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['afspraak_aanvragen'])) {
        $naam = $_POST['naam'];
        $email = $_POST['email'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $datum = $_POST['datum'];
        $tijd = $_POST['tijd'];
        $afsprakenSysteem->voegAfspraakToe($naam, $email, $telefoonnummer, $datum, $tijd);
    }

    if (isset($_POST['afspraak_wijzigen'])) {
        $id = $_POST['id'];
        $datum = $_POST['datum'];
        $tijd = $_POST['tijd'];
        $telefoonnummer = $_POST['telefoonnummer'];
        $afsprakenSysteem->wijzigAfspraak($id, $datum, $tijd, $telefoonnummer);
    }

    if (isset($_POST['afspraak_annuleren'])) {
        $id = $_POST['id'];
        $afsprakenSysteem->annuleerAfspraak($id);
    }
}

$afspraken = $afsprakenSysteem->haalAfsprakenOp();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afspraken Systeem</title>
    <link rel="stylesheet" href="afsprakenSysteem.css">
</head>
<body>

<h1>Afspraken Systeem</h1>

<h2>Nieuwe Afspraak Aanvragen</h2>
<form action="afsprakenSysteem.php" method="POST">
    <input type="text" name="naam" placeholder="Naam" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" required>
    <input type="date" name="datum" required>
    <input type="time" name="tijd" required>
    <button type="submit" name="afspraak_aanvragen">Afspraak Aanvragen</button>
</form>

<h2>Afspraak Wijzigen</h2>
<form action="afsprakenSysteem.php" method="POST">
    <input type="number" name="id" placeholder="Afspraak ID" required>
    <input type="date" name="datum" required>
    <input type="time" name="tijd" required>
    <input type="text" name="telefoonnummer" placeholder="Telefoonnummer" required>
    <button type="submit" name="afspraak_wijzigen">Afspraak Wijzigen</button>
</form>

<h2>Afspraak Annuleren</h2>
<form action="afsprakenSysteem.php" method="POST">
    <input type="number" name="id" placeholder="Afspraak ID" required>
    <button type="submit" name="afspraak_annuleren">Afspraak Annuleren</button>
</form>

<h2>Ingediende Afspraken</h2>
<ul>
    <?php foreach ($afspraken as $afspraak): ?>
        <li>
            <?php echo "Afspraak ID: " . $afspraak['id'] . " - Naam: " . $afspraak['naam'] . " - E-mail: " . $afspraak['email'] . " - Telefoonnummer: " . $afspraak['telefoonnummer'] . " - Datum: " . $afspraak['datum'] . " - Tijd: " . $afspraak['tijd']; ?>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
