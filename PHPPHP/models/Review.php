<?php

class Review
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function getAllReviewsByRoom($room_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE room_id = ?");
        $stmt->execute([$room_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createReview($room_id, $author, $content, $rating)
    {
        $stmt = $this->conn->prepare("INSERT INTO reviews (room_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
        $stmt->execute([$room_id, $author, $content, $rating]);
    }

    public function deleteReview($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM reviews WHERE id = ?");
        $stmt->execute([$id]);
    }
    public function getAllReviews()
    {
        $stmt = $this->conn->prepare("SELECT * FROM reviews");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
