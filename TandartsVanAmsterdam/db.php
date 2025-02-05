<?php
// database connectie aanmaken
$host = 'localhost';
$db = 'tandarts';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

class Database{ 


    public $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function InsertContact($name, $email, $message) {
        $sql = "INSERT INTO contact (name, email, message) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $placeholders = [$name, $email, $message];
        $stmt->execute($placeholders);
    }

    public function InsertFeedback($name, $email, $feedback, $rating) {
        $sql = "INSERT INTO feedback (name, email, feedback, rating) VALUES (?,?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $placeholders = [$name, $email, $feedback, $rating];
        $stmt->execute($placeholders);
    }

}

class AfsprakenSysteem {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function voegAfspraakToe($naam, $email, $telefoonnummer, $datum, $tijd) {
        $sql = "INSERT INTO afspraken (naam, email, telefoonnummer, datum, tijd) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$naam, $email, $telefoonnummer, $datum, $tijd]);
    }

    public function wijzigAfspraak($id, $datum, $tijd, $telefoonnummer) {
        $sql = "UPDATE afspraken SET datum = ?, tijd = ?, telefoonnummer = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$datum, $tijd, $telefoonnummer, $id]);
    }

    public function annuleerAfspraak($id) {
        $sql = "DELETE FROM afspraken WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    public function haalAfsprakenOp() {
        $sql = "SELECT * FROM afspraken";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$afsprakenSysteem = new AfsprakenSysteem($pdo);


?>
