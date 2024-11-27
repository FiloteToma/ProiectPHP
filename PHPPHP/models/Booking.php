<?php
class Booking
{
    private $conn;

    public function __construct()
    {
        require_once 'config/pdo.php';
        $this->conn = $pdo;
    }

    public function getAllBookings()
    {
        $stmt = $this->conn->query("SELECT b.id, b.booking_date, b.total_price, u.username, r.name AS room_name 
                                    FROM bookings b
                                    JOIN users u ON b.user_id = u.id
                                    JOIN rooms r ON b.room_id = r.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBookingById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM bookings WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
