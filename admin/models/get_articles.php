<?php
session_start();

// Inclusion du fichier de configuration de la base de données
// require_once '../config/database.php';

// Fonction pour récupérer les articles depuis la base de données
function getArticles($pdo) {
    try {
        $sql = "SELECT * FROM articles ORDER BY id DESC"; // Trier par ID au lieu de created_at
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

// Function to get a single article by ID
function getArticleById($pdo, $id) {
    try {
        $sql = "SELECT * FROM articles WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Erreur de base de données : " . $e->getMessage();
    }
}