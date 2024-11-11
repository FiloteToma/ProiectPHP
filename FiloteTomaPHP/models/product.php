<?php

class Product
{
    private $conn;

    public function __construct()
    {
        // Include fișierul pdo.php pentru a obține conexiunea PDO
        require_once 'config/pdo.php';
        $this->conn = $pdo; // Asignează obiectul $pdo la proprietatea $conn
    }

    public function getAllProducts()
    {
        $stmt = $this->conn->query("SELECT p.id, p.nume, p.descriere, p.pret, p.url_imagine, c.nume AS categorie 
                                    FROM produse p 
                                    JOIN categorii c ON p.id_categorie = c.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM produse WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategoryId($idCategorie)
    {
        $stmt = $this->conn->prepare("SELECT p.id, p.nume, p.descriere, p.pret, p.url_imagine, c.nume AS categorie 
                                      FROM produse p 
                                      JOIN categorii c ON p.id_categorie = c.id 
                                      WHERE p.id_categorie = :idCategorie");
        $stmt->bindValue(':idCategorie', $idCategorie, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
