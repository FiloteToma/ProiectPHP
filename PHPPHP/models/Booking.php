<?php

class Booking
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllBookings()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM bookings");
            $stmt->execute();
            $bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Prevenim XSS atunci când afișăm datele în interfață
            return array_map(function ($booking) {
                return array_map(function ($value) {
                    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }, $booking);
            }, $bookings);
        } catch (PDOException $e) {
            error_log("Eroare la preluarea rezervărilor: " . $e->getMessage());
            return [];
        }
    }

    public function createBooking($userId, $roomId, $bookingDate, $totalPrice)
    {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO bookings (user_id, room_id, booking_date, total_price) 
                VALUES (:user_id, :room_id, :booking_date, :total_price)
            ");

            $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
            $stmt->bindValue(':room_id', $roomId, PDO::PARAM_INT);
            $stmt->bindValue(':booking_date', $bookingDate, PDO::PARAM_STR);
            $stmt->bindValue(':total_price', $totalPrice, PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la crearea rezervării: " . $e->getMessage());
            throw new Exception("Eroare la crearea rezervării.");
        }
    }

    public function deleteBooking($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM bookings WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la ștergerea rezervării: " . $e->getMessage());
            throw new Exception("Eroare la ștergerea rezervării.");
        }
    }
}
