<?php
require_once '../config/database.php';

function deleteArticle($pdo, $articleId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute([':id' => $articleId]);
        header ('location: index.php?page=dashboard-copy');
        exit;
    } catch (PDOException $e) {
        return "Erreur de base de données : " . $e->getMessage();
    }
}
?>