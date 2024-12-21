<?php
session_start(); // Asigurăm inițializarea sesiunii

require_once 'config/pdo.php';
require_once 'controllers/HotelController.php';

define('BASE_PATH', __DIR__ . '/');

$action = $_GET['action'] ?? 'listRooms';
$controller = new HotelController($pdo);

// Verificăm dacă utilizatorul a dat click pe Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy(); // Distrugem sesiunea
    header('Location: index.php'); // Redirecționăm utilizatorul la pagina principală
    exit;
}

?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Bine ai venit în aplicația Hotel Management!</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Salut, <?php echo htmlspecialchars($_SESSION['username']); ?>! <a href="index.php?action=logout">Logout</a></p>
        <?php else: ?>
            <p><a href="login.php">Autentificare</a> | <a href="register.php">Înregistrare</a></p>
        <?php endif; ?>
    </header>

    <main>
        <?php
        switch ($action) {
            case 'listRooms':
                $controller->showAllRooms();
                break;

            case 'showRoom':
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $controller->showRoomDetails((int)$_GET['id']);
                } else {
                    echo "ID invalid!";
                }
                break;

            case 'createRoom':
                $controller->createRoom();
                break;

            case 'updateRoom':
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $controller->updateRoom();
                } else {
                    echo "ID invalid!";
                }
                break;

            case 'deleteRoom':
                $controller->deleteRoom();
                break;

            case 'showRoomReviews':
                if (isset($_GET['room_id']) && is_numeric($_GET['room_id'])) {
                    $controller->showRoomReviews((int)$_GET['room_id']);
                } else {
                    echo "ID invalid!";
                }
                break;

            case 'createReview':
                $controller->createReview();
                break;

            case 'deleteReview':
                $controller->deleteReview();
                break;

            default:
                echo "Acțiune invalidă!";
                break;
        }
        ?>
    </main>
</body>

</html>