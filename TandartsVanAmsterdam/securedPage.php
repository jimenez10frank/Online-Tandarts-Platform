<?php

session_start();
global $pdo;
require_once 'db.php';


function isAuthenticated(): bool
{
    return isset($_SESSION['logged_in'])
        && $_SESSION['logged_in'] === true;
}

if (!isAuthenticated()) {
    header("Location: hoofdpagina.php");
    exit;
}



//hier komt de code die alleen zichtbaar is voor ingelogde gebruikers in html
//hier controleer ik de status van de gebruiker deze kan zijn medewerker of patient deze status haal ik uit de database 'groep-3-online-tandarts-platform' en de tabel 'login'

$query = 'SELECT status FROM `groep-3-online-tandarts-platform`.login WHERE status = :status';
$stmt = $pdo->prepare($query);
$stmt->execute([':status' => $_SESSION['status']]);
$status = $stmt->fetch(PDO::FETCH_ASSOC);

echo $status['status'] === 'medewerker' ?
    '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tandarts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welkom medewerker ...</h1>
<?php
 echo "hallo";
 ?>
</body>
</html>' :

    '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tandarts</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welkom Gebruiker ...</h1>
</body>
</html>';




