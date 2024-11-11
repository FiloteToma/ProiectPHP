<?php
require_once __DIR__ . '/../models/product.php';

class ProductController
{
    public function showAllProducts()
    {
        $productModel = new Product();
        $products = $productModel->getAllProducts();
        include 'views/products/index.php'; // Include view-ul pentru afișare
    }

    public function showProduct($id)
    {
        $productModel = new Product();
        $product = $productModel->getProductById($id);
        if ($product) {
            include 'views/products/show.php';
        } else {
            echo "Produsul nu a fost găsit.";
        }
    }

    public function showCategoryById($idCategorie)
    {
        require_once 'models/Product.php';
        $productModel = new Product();
        $products = $productModel->getProductsByCategoryId($idCategorie);
        include 'views/products/index.php'; // Include view-ul pentru afișare
    }

    public function showProductDetails($id)
    {
        require_once 'config/pdo.php';

        $stmt = $pdo->prepare("SELECT * FROM produse WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            // Afișează sau procesează detaliile produsului
            include 'views/products/show.php'; // Include un view pentru afișare
        } else {
            echo "Produsul nu a fost găsit!";
        }
    }
}
