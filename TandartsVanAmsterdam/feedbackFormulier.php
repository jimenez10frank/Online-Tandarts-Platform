<?php

require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['geen_feedback'])) {

    $naam = htmlspecialchars(trim($_POST['naam']));
    $email = htmlspecialchars(trim($_POST['email']));
    $feedback = htmlspecialchars(trim($_POST['feedback']));
    $rating = htmlspecialchars(trim($_POST['rating']));

    if (!empty($naam) && !empty($email) && !empty($feedback) && !empty($rating)) {

        $db = new Database($pdo);
        
        try {
            $db->InsertFeedback($naam, $email, $feedback, $rating);
            echo "Bedankt voor uw feedback!";
        } catch (Exception $e) {
            echo "Er is een fout opgetreden bij het opslaan van uw feedback: " . $e->getMessage();
        }
    } else {
        echo "Vul alle velden in alstublieft.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbackformulier</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="feedbackFormulier.css">
    <script>
        function terugNaarHoofdpagina() {
            window.location.href = "hoofdpagina.php";
        }
    </script>
</head>
<body>

<div class="form-container">
    <h1><i class="fas fa-comment-dots"></i> Geef ons uw feedback</h1>
    <form action="feedbackformulier.php" method="POST">
        <div class="input-group">
            <label for="naam"><i class="fas fa-user"></i> Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>

        <div class="input-group">
            <label for="email"><i class="fas fa-envelope"></i> E-mail:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="input-group">
            <label for="rating"><i class="fas fa-star"></i> Beoordeling:</label>
            <select id="rating" name="rating" required>
                <option value="" disabled selected>Selecteer een beoordeling</option>
                <option value="1">1 - Zeer slecht</option>
                <option value="2">2 - Slecht</option>
                <option value="3">3 - Gemiddeld</option>
                <option value="4">4 - Goed</option>
                <option value="5">5 - Uitstekend</option>
            </select>
        </div>

        <div class="input-group">
            <label for="feedback"><i class="fas fa-comments"></i> Uw feedback:</label>
            <textarea id="feedback" name="feedback" rows="5" required></textarea>
        </div>

        <div class="button-group">
            <button type="submit" class="submit-btn"><i class="fas fa-paper-plane"></i> Verstuur feedback</button>
            <button type="button" class="back-btn" onclick="terugNaarHoofdpagina()"><i class="fas fa-undo-alt"></i> Liever geen feedback</button>
        </div>
    </form>
</div>

</body>
</html>
