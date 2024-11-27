<?php
require_once 'config/pdo.php';

try {
    $query = "SELECT * FROM rooms";
    $stmt = $pdo->query($query);
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "Conexiunea a fost realizată cu succes!<br>";
    echo "<pre>";
    print_r($rooms);
    echo "</pre>";
} catch (PDOException $e) {
    echo "Eroare la conexiunea cu baza de date: " . $e->getMessage();
}
