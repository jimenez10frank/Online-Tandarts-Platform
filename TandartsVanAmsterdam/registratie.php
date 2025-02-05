<?php
session_start();
//Hier kunnen gebruikers zich registreren zowel patienten als tandartsen in de database van de website
global $pdo;
require_once 'db.php';
// Hier maak ik de form aan voor de registratie
// Hier kunnen ze een gebruikersnaam en wachtwoord invullen
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $geboortedatum = $_POST["geboortedatum"];
    $geslacht = $_POST["geslacht"];
    $bsnnummer = $_POST["bsnnummer"];
    $telefoonnummer = $_POST["telefoonnummer"];
    $email = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $adres = $_POST["adres"];
    $password = $_POST['wachtwoord'] ?? '';
    $password = password_hash($password, PASSWORD_DEFAULT);
    $status = $_POST['type'] ?? '';
    var_dump($voornaam);
    // Hier wordt de data in de database gezet met een query
    $query = 'INSERT INTO `tandarts`.login (username, password, status, voornaam, achternaam, geboortedatum, geslacht, bsnnummer, telefoonnummer, adres) VALUES (:username, :wachtwoord, :status, :voornaam, :achternaam, :geboortedatum, :geslacht, :bsnnummer, :telefoonnummer, :adres)';
    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':username' => $email,
            ':wachtwoord' => $password,
            ':status' => $status,
            ':voornaam' => $voornaam,
            ':achternaam' => $achternaam,
            ':geboortedatum' => $geboortedatum,
            ':geslacht' => $geslacht,
            ':bsnnummer' => $bsnnummer,
            ':telefoonnummer' => $telefoonnummer,
            ':adres' => $adres
        ]);
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        echo "Database error: " . $e->getMessage();
        $error_message = "Er is een technische fout opgetreden. Probeer het later opnieuw.";
    }
//als de registratie is gelukt wordt de gebruiker doorgestuurd naar de login pagina

}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="hoofdpagina.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="logo"><span>Tandarts</span> van Amsterdam</div>
            <div class="nav-links">
                <a href="hoofdpagina.php">Home</a>
                <a href="login.php">Login</a>
                <a href="#over-ons">Over ons</a>
                <a href="Contact.html">Contact</a>
                <a href="registratie.php">Inschrijven</a>
                <a href="#bellen">Bellen</a>
                <a href="#afspraak" class="btn-afspraak">Maak een Afspraak</a>
            </div>
        </nav>
        <div class="form-container">
            <h2>Patient Registratie</h2>
            <form action="registratie.php" class="registration-form" method="post">
                <div class="form-group">
                <label for="voornaam">Voornaam</label>
                <input type="text" name="voornaam" placeholder="Uw Voornaam" required>
                </div>
                
                <div class="form-group">
                <label for="achternaam">Achternaam</label>
                <input type="text" name="achternaam" placeholder="Uw achternaam" required>
                </div>
                
                <div class="form-group">
                <label for="geboortedatum">Geboortedatum</label>
                <input type="date" name="geboortedatum" required>
                </div>
                
                <div class="form-group">
                <label for="geslacht">Geslacht</label>
                <div class="gender-options">
                <label><input type="radio" name="geslacht" value="man" required> Man</label>
                <label><input type="radio" name="geslacht" value="female" required> Vrouw</label>
                </div>
                </div>
                
                <div class="form-group">
                <label for="bsnnummer">BSN-Nummer</label>
                <input type="number" name="bsnnummer" placeholder="BSN-Nummer" required>
                </div>
                
                <div class="form-group">
                <label for="telefoonnummer">Telefoonnummer</label>
                <input type="tel" name="telefoonnummer" placeholder="Telefoonnummer" required>
                </div>
                
                <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="username" placeholder="E-Mail" required>
                </div>
                
                <div class="form-group">
                <label for="adres">Adres</label>
                <input type="text" name="adres" placeholder="Adres" required>
                </div>
                
                <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" name="wachtwoord" placeholder="Uw wachtwoord" required>
                </div>
    
                <select id="type" name="type">
                    <option value="patient">Patient</option>
                    <option value="tandarts">Tandarts</option>
                </select>
                
                <div class="form-group">
                <input type="submit" class="submit-btn" value="Registreren">
                </div>
                </form>
                </div>
                <footer>
        <div class="f-item-con">
            <div class="app-info">
                <span class='app-name'>
                    <span class='app-initial'>Tandarts</span> van Amsterdam
                </span>
                <p>Uw<strong> Tandarts</strong> Uw<strong> Zorg</strong></p>
            </div>
            <div class="useful-links">
                <div class="footer-title">Links</div>
                <ul>
                    <li>Contact</li>
                    <li>Over ons</li>
                    <li>Inschrijven</li>
                    <li>Bellen</li>
                    <li>Maak Een afspraak</li>
                </ul>
            </div>
            <div class="help-sec">
                <div class="footer-title">Help</div>
                <ul>
                    <li>Vastgestelde Vragen</li>
                    <li>Feedback</li>
                    <li>Report a Issue / Bug BEL: 0621932719</li>
                </ul>
            </div>
            <div class="g-i-t">
                <div class="footer-title">Stuur Ons Een Bericht</div>
                <form action="/" method="post" class="space-y-2">
                    <input type="text" name="g-name" class="g-inp" id="g-name" placeholder='Name' />
                    <input type="email" name="g-email" class="g-inp" id="g-email" placeholder='Email' />
                    <textarea type="text" name="g-msg" class="g-inp h-40 resize-none" id="g-msg"
                        placeholder='Message...'></textarea>
                    <button type="submit" class='f-btn'>Versturen</button>
                </form>
            </div>
        </div>
        <div class='cr-con'>Copyright &copy; 2024 | Tandarts van Amsterdam</div>
    </footer>
                </body>
                </html>
