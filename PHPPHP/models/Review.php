<?php

class Review
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllReviewsByRoom($roomId)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM reviews WHERE room_id = :room_id");
            $stmt->bindValue(':room_id', (int) $roomId, PDO::PARAM_INT);
            $stmt->execute();
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Prevenim XSS atunci când afișăm datele în interfață
            return array_map(function ($review) {
                return array_map(function ($value) {
                    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
                }, $review);
            }, $reviews);
        } catch (PDOException $e) {
            error_log("Eroare la preluarea recenziilor: " . $e->getMessage());
            return [];
        }
    }

    public function createReview($roomId, $author, $content, $rating)
    {
        try {
            $stmt = $this->conn->prepare("
                INSERT INTO reviews (room_id, author, content, rating) 
                VALUES (:room_id, :author, :content, :rating)
            ");

            $stmt->bindValue(':room_id', (int) $roomId, PDO::PARAM_INT);
            $stmt->bindValue(':author', htmlspecialchars($author, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':content', htmlspecialchars($content, ENT_QUOTES, 'UTF-8'), PDO::PARAM_STR);
            $stmt->bindValue(':rating', (int) $rating, PDO::PARAM_INT);

            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la crearea recenziei: " . $e->getMessage());
            throw new Exception("Eroare la crearea recenziei.");
        }
    }

    public function deleteReview($id)
    {
        try {
            $stmt = $this->conn->prepare("DELETE FROM reviews WHERE id = :id");
            $stmt->bindValue(':id', (int) $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            error_log("Eroare la ștergerea recenziei: " . $e->getMessage());
            throw new Exception("Eroare la ștergerea recenziei.");
        }
    }
}
