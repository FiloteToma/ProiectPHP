<?php
require_once 'config/pdo.php';

// Asigură-te că folosești aceeași variabilă pentru conexiune
try {
    // Script pentru crearea tabelelor și inserarea datelor inițiale
    $pdo->exec("
    CREATE TABLE IF NOT EXISTS categorii (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nume VARCHAR(255) NOT NULL
    );
    ");

    $pdo->exec("
    CREATE TABLE IF NOT EXISTS produse (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nume VARCHAR(255) NOT NULL,
        descriere TEXT,
        pret DECIMAL(10, 2),
        url_imagine VARCHAR(255),
        id_categorie INT,
        FOREIGN KEY (id_categorie) REFERENCES categorii(id)
    );
    ");

    // Inserează categorii inițiale
    $pdo->exec("INSERT INTO categorii (nume) VALUES ('Mouse'), ('Tastatură'), ('Căști');");

    // Inserează produse inițiale
    $pdo->exec("
    INSERT INTO produse (nume, descriere, pret, url_imagine, id_categorie) VALUES
    ('Mouse wireless', 'Mouse ergonomic, fără fir', 99.99, 'mouse.jpg', 1),
    ('Tastatură RGB', 'Tastatură iluminată, mecanică', 249.99, 'tastatura.jpg', 2),
    ('Căști wireless Sony', 'Căști cu noise cancelling', 599.99, 'casti.jpg', 3);
    ");

    echo "Migrarea a fost creată și tabelele au fost populate cu succes.";
} catch (PDOException $e) {
    echo "Eroare la crearea migrării: " . $e->getMessage();
}

// Închide conexiunea la baza de date
$pdo = null;
