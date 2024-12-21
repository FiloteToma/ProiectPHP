<?php
class Room
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllRooms()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM rooms");
            $stmt->execute();

            $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array_map(function ($room) {
                return array_map(function ($value) {
                    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }, $room);
            }, $rooms);
        } catch (PDOException $e) {
            error_log("Eroare la preluarea camerelor: " . $e->getMessage());
            return [];
        }
    }

    public function getRoomById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM rooms WHERE id = :id");
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();

            $room = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($room) {
                return array_map(function ($value) {
                    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }, $room);
            }

            return null;
        } catch (PDOException $e) {
            error_log("Eroare la preluarea detaliilor camerei: " . $e->getMessage());
            return null;
        }
    }

    public function createRoom($name, $description, $price, $status)
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO rooms (name, description, price, status) VALUES (:name, :description, :price, :status)"
            );

            $stmt->bindValue(':name', htmlspecialchars($name, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':description', htmlspecialchars($description, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':price', (float) $price, PDO::PARAM_STR);
            $stmt->bindValue(':status', htmlspecialchars($status, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la crearea camerei: " . $e->getMessage());
            throw new Exception("Eroare la crearea camerei.");
        }
    }

    public function updateRoom($id, $name, $description, $price, $status)
    {
        try {
            $stmt = $this->conn->prepare(
                "UPDATE rooms SET name = :name, description = :description, price = :price, status = :status WHERE id = :id"
            );

            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->bindValue(':name', htmlspecialchars($name, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':description', htmlspecialchars($description, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':price', (float) $price, PDO::PARAM_STR);
            $stmt->bindValue(':status', htmlspecialchars($status, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la actualizarea camerei: " . $e->getMessage());
            throw new Exception("Eroare la actualizarea camerei.");
        }
    }

    public function deleteRoom($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM rooms WHERE id = :id");
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la ștergerea camerei: " . $e->getMessage());
            throw new Exception("Eroare la ștergerea camerei.");
        }
    }
}
