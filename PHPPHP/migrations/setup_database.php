<?php
require_once __DIR__ . '/../config/pdo.php';

try {

    $stmt = $pdo->query("SELECT COUNT(*) FROM rooms");
    $rowCount = $stmt->fetchColumn();

    if ($rowCount == 0) {

        $pdo->exec("
            INSERT INTO rooms (name, description, price, status) VALUES
            ('Camera Standard', 'Cameră simplă, perfectă pentru o persoană.', 100.00, 'available'),
            ('Camera Deluxe', 'Cameră spațioasă pentru două persoane.', 200.00, 'available');
        ");
        echo "Tabela rooms a fost populată cu date inițiale!";
    } else {
        echo "Tabela rooms conține deja date. Inserarea nu este necesară.";
    }
} catch (PDOException $e) {
    die("Eroare la configurarea bazei de date: " . $e->getMessage());
}
