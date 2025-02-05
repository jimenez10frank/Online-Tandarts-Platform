<?php

global $pdo;
session_start();
include 'db.php';

$sql = $pdo->query("SELECT * FROM afspraken");
$afspraken = $sql->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $sql = $pdo->prepare("DELETE FROM afspraken WHERE id = ?");
        $placeholders = array($id);
        $sql->execute($placeholders);

        header("Location: afspraakoverzicht.php");
        exit;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afsprakenoverzicht</title>
    <link rel="stylesheet" href="afspraakoverzicht.css">
</head>
<body>
    <div class="container">
    <h1>Afspraken</h1>
    <p>Tandarts van Amsterdam</p>
    <hr>
<table>
            <thead>
                <tr>
                    <th>AfspraakID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                    <th>Datum</th>
                    <th>Tijd</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($afspraken as $afspraak) {
                    echo "<tr>";
                    echo "<td> " . $afspraak['id'] . "</td>";
                    echo "<td> " . $afspraak['naam'] . "</td>";
                    echo "<td> " . $afspraak['email'] . "</td>";
                    echo "<td> " . $afspraak['telefoonnummer'] . "</td>";   
                    echo "<td> " . $afspraak['datum'] . "</td>";   
                    echo "<td> " . $afspraak['tijd'] . "</td>";  
                    echo "<td><a class='delete' href='?id=" . $afspraak['id'] . "' onclick='return confirm(\"Weet je zeker dat je deze afspraak wilt verwijderen?\");'>Verwijderen</a></td>";     
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
            </div>
</body>
</html>