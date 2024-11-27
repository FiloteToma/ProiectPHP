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
        $query = "SELECT * FROM rooms";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRoomById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM rooms WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function createRoom($name, $description, $price, $status)
    {
        $stmt = $this->conn->prepare("INSERT INTO rooms (name, description, price, status) VALUES (:name, :description, :price, :status)");
        $stmt->execute([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'status' => $status,
        ]);
    }

    public function updateRoom($id, $name, $description, $price, $status)
    {
        $stmt = $this->conn->prepare("UPDATE rooms SET name = :name, description = :description, price = :price, status = :status WHERE id = :id");
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'status' => $status,
        ]);
    }

    public function deleteRoom($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM rooms WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
