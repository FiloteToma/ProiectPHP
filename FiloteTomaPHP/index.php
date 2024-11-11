<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'controllers/ProductController.php';

$controller = new ProductController();



if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'showAll') {
        $controller->showAllProducts();
    } elseif ($action == 'showCategoryById' && isset($_GET['id_categorie'])) {
        $idCategorie = (int)$_GET['id_categorie'];
        $controller->showCategoryById($idCategorie);
    } elseif ($action == 'show' && isset($_GET['id'])) {
        $controller->showProduct($_GET['id']);
    } else {
        echo "Acțiune invalidă.";
    }
} else {
    $controller->showAllProducts(); // Acțiunea implicită
}
