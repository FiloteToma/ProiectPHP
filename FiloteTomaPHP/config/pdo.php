<?php
// Include fișierul de configurare care conține detaliile bazei de date
require_once "config.php";

try {
    // Creează conexiunea PDO folosind detaliile din array-ul $config
    $pdo = new PDO(
        'mysql:host=' . $config['db_host'] . ';port=3306;dbname=' . $config['db_name'],
        $config['db_user'],
        $config['db_password']
    );
    // Setează modul de eroare pentru a arunca excepții în caz de erori
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Afișează un mesaj de eroare și oprește scriptul dacă conexiunea eșuează
    die("Conexiunea la baza de date a eșuat: " . $e->getMessage());
}
