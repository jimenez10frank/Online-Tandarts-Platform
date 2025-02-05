<?php
// Login pagina voor de tandartsen verificatie
global $pdo;
session_start();
require_once 'db.php';

/**
 * Stel de loginstatus in.
 *
 * @param bool $status
 * @throws RandomException
 */
function setLoginStatus($status): void {
    if ($status === true) {
        $_SESSION['logged_in'] = true;
    } else {
        $_SESSION['logged_in'] = false;
    }
}

try {
    setLoginStatus(false);
} catch (RandomException $e) {
    // Log de fout of handel deze af indien nodig
}

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username_login = filter_input(INPUT_POST, 'username_login', FILTER_SANITIZE_STRING);
    $password_login = $_POST['password_login'] ?? '';

    // Voorbereiding van de SQL-query met named parameters
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

    // HTML output voor foutmelding
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

<form class="login_box" method="post">
    <h1>Login</h1>
    <label for="username_login">Username:</label>
    <input type="text" id="username_login" name="username_login" required>

    <label for="password_login">Password:</label>
    <input type="password" id="password_login" name="password_login" required>

    <button type="submit">Login</button>
</form>
