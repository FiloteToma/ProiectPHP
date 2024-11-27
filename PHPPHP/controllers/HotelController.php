<?php

require_once __DIR__ . '/../models/Room.php';

class HotelController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function showAllRooms()
    {
        $room = new Room($this->conn);
        $rooms = $room->getAllRooms();

        if (!$rooms) {
            echo "Nu s-au găsit camere.";
            return;
        }

        include BASE_PATH . 'views/listRooms.php';
    }

    public function showRoomDetails($id)
    {
        $room = new Room($this->conn);
        $roomDetails = $room->getRoomById($id);

        include BASE_PATH . 'views/showRoomDetails.php';
    }

    public function createRoom()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            $room = new Room($this->conn);
            $room->createRoom($name, $description, $price, $status);

            header("Location: index.php?action=listRooms");
            exit;
        } else {
            include BASE_PATH . 'views/createRoomForm.php';
        }
    }

    public function updateRoom()
    {
        $room = new Room($this->conn);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_GET['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            $room->updateRoom($id, $name, $description, $price, $status);

            header("Location: index.php?action=listRooms");
            exit;
        } else {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                $roomDetails = $room->getRoomById($id);

                include BASE_PATH . 'views/updateRoomForm.php';
            } else {
                echo "ID-ul camerei este invalid!";
            }
        }
    }

    public function deleteRoom()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            $room = new Room($this->conn);
            $room->deleteRoom($id);

            header("Location: index.php?action=listRooms");
            exit;
        } else {
            echo "ID-ul camerei este invalid sau lipsește!";
        }
    }
    public function showRoomReviews($room_id)
    {
        $review = new Review($this->conn);
        $reviews = $review->getAllReviewsByRoom($room_id);

        include BASE_PATH . 'views/listReviews.php';
    }

    public function createReview()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $room_id = $_POST['room_id'];
            $author = $_POST['author'];
            $content = $_POST['content'];
            $rating = $_POST['rating'];

            $review = new Review($this->conn);
            $review->createReview($room_id, $author, $content, $rating);

            header("Location: index.php?action=showRoomReviews&room_id=" . $room_id);
            exit;
        } else {
            include BASE_PATH . 'views/createReviewForm.php';
        }
    }

    public function deleteReview()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];

            $review = new Review($this->conn);
            $review->deleteReview($id);

            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "ID-ul recenziei este invalid!";
        }
    }
}
