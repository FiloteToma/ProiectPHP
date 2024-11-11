
-- Crearea tabelului pentru categorii de periferice
CREATE TABLE categorii (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(255) NOT NULL,
    descriere TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Crearea tabelului pentru produse
CREATE TABLE produse (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nume VARCHAR(255) NOT NULL,
    descriere TEXT,
    pret DECIMAL(10, 2) NOT NULL,
    id_categorie INT NOT NULL,
    url_imagine VARCHAR(255),
    FOREIGN KEY (id_categorie) REFERENCES categorii(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserarea unor date de test în tabelul categorii
INSERT INTO categorii (nume, descriere) VALUES ('Mouse', 'Periferic pentru controlul cursorului pe ecran.');
INSERT INTO categorii (nume, descriere) VALUES ('Tastatură', 'Periferic pentru tastarea textului.');

-- Inserarea unor date de test în tabelul produse
INSERT INTO produse (nume, descriere, pret, id_categorie, url_imagine) 
VALUES ('Mouse Logitech', 'Mouse wireless de calitate superioară.', 150.00, 1, '1.jpg');
INSERT INTO produse (nume, descriere, pret, id_categorie, url_imagine) 
VALUES ('Tastatură SteelSeries', 'Tastatură mecanică pentru gaming.', 400.00, 2, '2.jpg');
