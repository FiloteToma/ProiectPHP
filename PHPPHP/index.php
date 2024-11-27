<?php
require_once 'config/pdo.php';
require_once 'controllers/HotelController.php';

$action = $_GET['action'] ?? 'listRooms';
$controller = new HotelController($pdo);

define('BASE_PATH', __DIR__ . '/');

switch ($action) {
    case 'listRooms':
        $controller->showAllRooms();
        break;

    case 'showRoom':
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $controller->showRoomDetails($_GET['id']);
        } else {
        }
        break;

    case 'createRoom':
        $controller->createRoom();
        break;

    case 'updateRoom':
        $controller->updateRoom();
        break;

    case 'deleteRoom':
        $controller->deleteRoom();
        break;

    case 'showRoomReviews':
        if (isset($_GET['room_id']) && is_numeric($_GET['room_id'])) {
            $controller->showRoomReviews((int)$_GET['room_id']);
        } else {
        }
        break;

    case 'createReview':
        $controller->createReview();
        break;

    case 'deleteReview':
        $controller->deleteReview();
        break;

    default:
        break;
}
