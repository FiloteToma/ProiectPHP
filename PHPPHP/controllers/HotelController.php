<?php

require_once __DIR__ . '/../models/Room.php';
require_once __DIR__ . '/../models/Review.php';
require_once __DIR__ . '/../models/Booking.php';

class HotelController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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
        if ($_SESSION['role'] !== 'admin') {
            die("Acces interzis! Doar adminii pot accesa această secțiune.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Metodă HTTP invalidă!");
        }

        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die("Cerere CSRF detectată!");
        }

        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $price = (float)$_POST['price'];
        $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

        $room = new Room($this->conn);
        $room->createRoom($name, $description, $price, $status);

        $_SESSION['flash_message'] = "Camera a fost adăugată cu succes!";
        header("Location: index.php?action=listRooms");
        exit;
    }

    public function updateRoom()
    {

        if ($_SESSION['role'] !== 'admin') {
            die("Acces interzis! Doar adminii pot accesa această secțiune.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Metodă HTTP invalidă!");
        }

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            die("ID invalid!");
        }

        // Preia datele din POST
        $id = (int)$_POST['id'];
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
        $price = (float)$_POST['price'];
        $status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

        // Actualizează în baza de date
        $room = new Room($this->conn);
        $room->updateRoom($id, $name, $description, $price, $status);

        $_SESSION['flash_message'] = "Camera a fost actualizată cu succes!";
        header("Location: index.php?action=listRooms");
        exit;
    }






    public function deleteRoom()
    {
        if ($_SESSION['role'] !== 'admin') {
            die("Acces interzis! Doar adminii pot accesa această secțiune.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Metodă HTTP invalidă!");
        }

        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die("Cerere CSRF detectată!");
        }

        $id = (int)$_GET['id'];

        $room = new Room($this->conn);
        $room->deleteRoom($id);

        $_SESSION['flash_message'] = "Camera a fost ștearsă cu succes!";
        header("Location: index.php?action=listRooms");
        exit;
    }

    public function showRoomReviews($room_id)
    {
        $review = new Review($this->conn);
        $reviews = $review->getAllReviewsByRoom($room_id);

        include BASE_PATH . 'views/listReviews.php';
    }

    public function createReview()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Metodă HTTP invalidă!");
        }

        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
            die("Cerere CSRF detectată!");
        }

        $room_id = (int)$_POST['room_id'];
        $author = htmlspecialchars($_POST['author'], ENT_QUOTES, 'UTF-8');
        $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
        $rating = (int)$_POST['rating'];

        $review = new Review($this->conn);
        $review->createReview($room_id, $author, $content, $rating);

        $_SESSION['flash_message'] = "Recenzia a fost adăugată cu succes!";
        header("Location: index.php?action=showRoomReviews&room_id=" . $room_id);
        exit;
    }

    public function deleteReview()
    {
        if ($_SESSION['role'] !== 'admin') {
            die("Acces interzis! Doar adminii pot accesa această secțiune.");
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die("Metodă HTTP invalidă!");
        }

        $id = (int)$_POST['id'];
        $review = new Review($this->conn);
        $review->deleteReview($id);

        $_SESSION['flash_message'] = "Recenzia a fost ștearsă cu succes!";
        header("Location: index.php?action=showRoomReviews");
        exit;
    }
}
