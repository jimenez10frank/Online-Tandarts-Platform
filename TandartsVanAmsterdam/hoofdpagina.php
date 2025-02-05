<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hoofdpagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Tandarts van Amsterdam</title>
    
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'nl',
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</head>
<body>

<nav class="navbar">
    <div class="logo" button onclick="navigate('home')" style="cursor: pointer;"><span>Tandarts</span> van Amsterdam</div>
    <div class="nav-links">
        <button onclick="navigate('over-ons')">Over ons</button>
        <button onclick="navigate('contact')">Contact</button>
        <button onclick="navigate('afspraak')" class="btn-afspraak">Maak een Afspraak</button>
        <button onclick="navigate('login')">Login</button>
        <button onclick="navigate('registratie')">Registratie</button>
    </div>
    <div id="google_translate_element" style="margin-left: 20px;"></div>
</nav>

<div class="content">
    <div id="home" class="section active">
        <header>
            <video autoplay muted loop src="fotos/achtergrondVideo.mp4" id="backgroundVideo"></video>
            <h1>Welkom bij <span>Tandarts</span> van Amsterdam</h1>
            <p>Uw glimlach, onze zorg!</p>
            <button onclick="navigate('afspraak')" class="btn-custom">Maak een Afspraak</button>

        </header>
        <?php
        session_start();

        echo $_SESSION['registratie'] === true && isset($_SESSION['registratie'])
            ? '<div class="alert_succes"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="65" height="65"><path fill="none" d="M0 0H24V24H0z"/><path d="M12 1l8.217 1.826c.457.102.783.507.783.976v9.987c0 2.006-1.003 3.88-2.672 4.992L12 23l-6.328-4.219C4.002 17.668 3 15.795 3 13.79V3.802c0-.469.326-.874.783-.976L12 1zm4.452 7.222l-4.95 4.949-2.828-2.828-1.414 1.414L11.503 16l6.364-6.364-1.415-1.414z"/></svg><p>Account is succesvol aangemaakt</p></div>'
            : '';
        ?>
    </div>
</div>

<div id="over-ons" class="section">
<h1>Over ons</h1>
    <p><i class="fas fa-tooth"></i> Wij zijn een team van toegewijde tandartsen in Amsterdam.</p>
    
    <h2><i class="fas fa-tools"></i> Onze Diensten</h2>
    <ul>
        <li><i class="fas fa-check-circle"></i> Algemene Tandheelkunde</li>
        <li><i class="fas fa-check-circle"></i> Esthetische Tandheelkunde</li>
        <li><i class="fas fa-check-circle"></i> Orthodontie</li>
        <li><i class="fas fa-check-circle"></i> Preventieve Tandheelkunde</li>
        <li><i class="fas fa-check-circle"></i> Wortelkanaalbehandelingen</li>
        <li><i class="fas fa-check-circle"></i> Gebitsreiniging</li>
        <li><i class="fas fa-check-circle"></i> Kindertandheelkunde</li>
        <li><i class="fas fa-check-circle"></i> Implantologie</li>
    </ul>
    
    <h2><i class="fas fa-user-md"></i> Wie We Zijn</h2>
    <p>Bij Tandarts van Amsterdam hebben we een team van ervaren professionals:</p>
    <ul>
        <li><i class="fas fa-user-tie"></i> Dr. Anne de Vries - Tandarts</li>
        <li><i class="fas fa-user-tie"></i> Dr. Mark Jansen - Tandarts</li>
        <li><i class="fas fa-user"></i> Linda Bakker - Mondhygiënist</li>
        <li><i class="fas fa-user"></i> Sarah Klaver - Tandartsassistent</li>
    </ul>

    <h2><i class="fas fa-history"></i> Ons Verhaal</h2>
    <p>Tandarts van Amsterdam is ontstaan vanuit de wens om hoogwaardige tandheelkundige zorg toegankelijk te maken voor iedereen. Sinds onze opening hebben we ons ingezet om een vriendelijke en professionele omgeving te bieden, waar onze patiënten zich op hun gemak voelen.</p>

    <h2><i class="fas fa-trophy"></i> Waarom Wij De Beste Praktijk Zijn</h2>
    <p>Onze praktijk staat bekend om zijn patiëntgerichte benadering, moderne faciliteiten, en het gebruik van de nieuwste technologieën in de tandheelkunde. We geloven in continue educatie en verbetering om de beste zorg te kunnen bieden.</p>

    <h2><i class="fas fa-comments"></i> Reviews</h2>
    <p>Wat onze patiënten zeggen:</p>
    <div class="reviews">
        <div class="review-item">
            <i class="fas fa-user-circle"></i> <strong>Jan S.</strong>
            <p>"Uitstekende service! De tandarts nam de tijd om alles goed uit te leggen."</p>
            <div class="stars">
                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>
            </div>
        </div>
        <div class="review-item">
            <i class="fas fa-user-circle"></i> <strong>Maria V.</strong>
            <p>"Ik ben zeer tevreden over mijn behandelingen. Het personeel is vriendelijk en professioneel."</p>
            <div class="stars">
                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i>
            </div>
        </div>
        <div class="review-item">
            <i class="fas fa-user-circle"></i> <strong>Kees R.</strong>
            <p>"Een geweldige ervaring! Ik heb nooit zo'n goede tandarts gehad."</p>
            <div class="stars">
                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i class="fas fa-star-half-alt"></i>
            </div>
        </div>
    </div>
</div>

<div id="contact" class="section">
    <?php

require "db.php";

$db = new Database($pdo); 

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $db->InsertContact($_POST["name"], $_POST["email"],$_POST["message"]);
     }
} 
catch (PDOException $e) {
    echo "error" . $e->getMessage();
}


    
?>
    <section class="contact-section">
        <!-- Contact Form -->
        <div class="contact-form-container">
            <h2>Vragen?</h2>
            <form method="post">
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Naam</label>
                    <input type="text" name="name" id="name" placeholder="Uw naam" required>
                </div>
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email" id="email" placeholder="Uw email" required>
                </div>
                <div class="form-group">
                    <label for="message"><i class="fas fa-comment"></i> Bericht</label>
                    <textarea name="message" id="message" placeholder="Uw bericht" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Verstuur <i class="fas fa-paper-plane"></i></button>
            </form>
        </div>

        <!-- Contact Information & Location -->
        <div class="contact-location-container">
            <!-- Contact Information -->
            <div class="contact-info">
                <h2>Neem contact met ons op</h2>
                <p><i class="fas fa-map-marker-alt"></i> Fraijlemaborg 135, 1102 CV Amsterdam</p>
                <p><i class="fas fa-phone-alt"></i> (020) 579 11 11</p>
                <p><i class="fas fa-envelope"></i> tandartsvanamsterdam@ams.nl</p>
                <p><i class="fas fa-clock"></i> Openingstijden:</p>
                <ul>
                    <li>Maandag - Vrijdag: 08:00 - 18:00</li>
                    <li>Zaterdag: 09:00 - 16:00</li>
                    <li>Zondag: Gesloten</li>
                </ul>

                <!-- Emergency contact -->
                <div class="emergency-contact">
                    <h3><i class="fas fa-exclamation-circle"></i> Noodgeval?</h3>
                    <p>Bel onze noodlijn: <strong>(020) 579 22 22</strong> voor directe tandheelkundige hulp buiten
                        kantooruren.</p>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="google-maps">
                <h3>Onze locatie</h3>
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.6413207096186!2d4.945297951195007!3d52.31219797967037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c60a543fcd2bb3%3A0xd10fbf6472643b69!2sFraijlemaborg%20135%2C%201102%20CV%20Amsterdam!5e0!3m2!1sen!2snl!4v1695653938223!5m2!1sen!2snl"
                        width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>

        <!-- FAQ section -->
        <div class="faq-section">
            <h2>Veelgestelde Vragen</h2>
            <div class="faq-item">
                <h4>Wat moet ik meenemen naar mijn afspraak?</h4>
                <p>Zorg ervoor dat u uw identiteitsbewijs en verzekeringsgegevens meeneemt naar uw afspraak.</p>
            </div>
            <div class="faq-item">
                <h4>Hoe kan ik mijn afspraak wijzigen of annuleren?</h4>
                <p>U kunt uw afspraak wijzigen of annuleren door ons telefonisch te bereiken op (020) 579 11 11.</p>
            </div>
            <div class="faq-item">
                <h4>Wat als ik een noodgeval heb buiten kantooruren?</h4>
                <p>Bel onze noodlijn op <strong>(020) 579 22 22</strong> voor directe hulp.</p>
            </div>
        </div>

        <!-- Social Media -->
        <div class="social-media">
            <h3>Volg ons</h3>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </section>
</div>

<div id="bellen" class="section">
    <h1>Bellen</h1>
    <p>Bel ons op 020-1234567 voor meer informatie.</p>
</div>

<div id="afspraak" class="section">
    <h1>Maak een Afspraak</h1>
    <p>Plan uw afspraak online via ons formulier.</p>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" placeholder="Uw naam" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Uw email" required>
        </div>
        <div class="form-group">
            <label for="phone">Telefoonnummer</label>
            <input type="tel" name="phone" id="phone" placeholder="Uw telefoonnummer" required>
        </div>
        <div class="form-group">
            <label for="date">Datum</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="time">Tijd</label>
            <input type="time" name="time" id="time" required>
        </div>
        <div class="form-group">
            <label for="submit"></label>
            <button type="submit" id="submit" class="btn-custom">Afspraak maken</button>
        </div>
    </form>
</div>
<div id="login" class="section">
    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    // Login pagina voor de tandartsen verificatie
    global $pdo;
    session_start();
    require_once 'db.php';

    /**
     * @throws RandomException
     */
    function setLoginStatus($status): void
    {
        if ($status === true) {
            $_SESSION['logged_in'] = true;
        } else {
            $_SESSION['logged_in'] = false;
        }
    }

    try {
        setLoginStatus(false);
    } catch (RandomException $e) {
    }
    $error_message = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username_login = filter_input(INPUT_POST, 'username_login', FILTER_SANITIZE_STRING);
        $password_login = $_POST['password_login'] ?? '';

        // voorbereiding van de sql-query met named parameters
        $query = 'SELECT username, password FROM `tandarts`.login WHERE username = :username';

        try {
            $stmt = $pdo->prepare($query);
            $stmt->execute([':username' => $username_login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password_login, $user['password'])) {
                setLoginStatus(true);
                header("Location: loading.php");
                exit;
            }

            $error_message = "Gebruikersnaam of wachtwoord is verkeerd.";
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            $error_message = "Er is een technische fout opgetreden. Probeer het later opnieuw.";
        } catch (RandomException $e) {
            error_log("Random error: " . $e->getMessage());
            $error_message = "Er is een technische fout opgetreden. Probeer het later opnieuw.";
        }
        if (!$user) {
            error_log("Geen gebruiker gevonden met de gebruikersnaam: " . $username_login);
        }

        // HTML output
        if ($error_message) {
            echo <<<HTML
    <div class="alert">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="65" height="65">
            <path fill="none" d="M0 0h24v24H0z"/>
            <path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm-1-7v2h2v-2h-2zm0-8v6h2V7h-2z"/>
        </svg>
        <p>$error_message</p>
    </div>
    HTML;
        }
    }
    ?>
    <form class="login_box" action="loading.php" method="post">
        <h1>Login</h1>
        <label for="username_login">Username:</label>
        <input type="text" id="username_login" name="username_login" required>
        <label for="password_login">Password:</label>
        <input type="password" id="password_login" name="password_login" required>
        <button type="submit">Login</button>
    </form>


</div>
<div id="registratie" class="section">
    <?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
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


    }
    ?>
    <div class="form-container">
        <h2>Patient Registratie</h2>
        <form class="registration-form" method="post">
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
</div>
<footer>
    <div class="f-item-con">
        <div class="app-info">
                <span class='app-name'>
                    <span class='app-initial'>Tandarts</span> van Amsterdam
                </span>
                        <!-- Social Media -->
        <div class="social-media">
            <h3><span>Volg Ons</span></h3>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        </div>
        <div class="useful-links">
            <div class="footer-title">Gebruikbare Links</div>
            <ul>
                <li button onclick="navigate('over-ons')">Over ons</li>
                <li button onclick="navigate('afspraak')">Afspraak Maken</li>
                <li>Termen en Condities</li>
            </ul>
        </div>
        <div class="help-sec">
            <div class="footer-title">Help</div>
            <ul>
                <li button onclick="navigate('contact')">Contact</li>
                <li button onclick="navigate('contact')">Vastgesteelde Vragen</li>
                <li><a href="avg.html">Privacy Verklaring</a></li>
            </ul>
        </div>
        <div class="g-i-t">
            <div class="footer-title">Stuur ons een bericht</div>
            <form method="post" class="space-y-2">
                <input type="text" name="name" class="g-inp" id="name" placeholder='Naam' required/>
                <input type="email" name="email" class="g-inp" id="email" placeholder='Email' required/>
                <textarea name="message" class="g-inp h-40 resize-none" id="message" placeholder='Bericht...' required></textarea>
                <button type="submit" class='f-btn'>Verstuur!</button>
            </form>
        </div>
    </div>
    <div class='cr-con'>Copyright &copy; 2024 | Tandarts van Amsterdam</div>
</footer>

<script>
    function navigate(sectionId) {
        const sections = document.querySelectorAll('.section');
        sections.forEach(function (section) {
            section.classList.remove('active');
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.classList.add('active');
        }
    }

    window.addEventListener('load', function () {
        const hash = window.location.hash.substring(1);
        if (hash) {
            navigate(hash);
        } else {
            navigate('home');
        }
    });
</script>
</body>
</html>