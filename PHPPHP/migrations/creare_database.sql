CREATE DATABASE IF NOT EXISTS hotel_management;
USE hotel_management;

-- Tabelul utilizatori
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabelul camere
CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    status ENUM('available', 'booked', 'maintenance') DEFAULT 'available'
);

-- Tabelul rezervări
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    room_id INT NOT NULL,
    booking_date DATE NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

-- Tabelul recenzii
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_id INT NOT NULL,
    user_id INT NOT NULL,
    rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Inserare utilizatori
INSERT INTO users (username, email, password_hash, role) VALUES
('admin', 'admin@hotel.com', MD5('adminpass'), 'admin'),
('john_doe', 'john@example.com', MD5('password123'), 'user');

-- Inserare camere
INSERT INTO rooms (name, description, price, status) VALUES
('Camera Standard', 'O cameră simplă, ideală pentru o persoană.', 100.00, 'available'),
('Camera Deluxe', 'O cameră mai spațioasă, ideală pentru două persoane.', 200.00, 'available'),
('Suită Premium', 'Suită de lux, cu vedere panoramică.', 500.00, 'available');

-- Inserare rezervări (acum user_id=2 și room_id=1,2 există deja)
INSERT INTO bookings (user_id, room_id, booking_date, total_price) VALUES
(2, 1, '2024-12-01', 100.00),
(2, 2, '2024-12-02', 200.00);

-- Inserare recenzii
INSERT INTO reviews (room_id, user_id, rating, comment) VALUES
(1, 2, 5, 'Cameră foarte curată și confortabilă!'),
(2, 2, 4, 'Experiență plăcută, dar aș fi vrut mai multe facilități.');
