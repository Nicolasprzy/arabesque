<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    
    try {
        $stmt = $pdo->prepare("SELECT id, title, SUBSTR(content, 1, 100) AS excerpt FROM articles WHERE title LIKE ? OR content LIKE ?");
        $stmt->execute(['%' . $query . '%', '%' . $query . '%']);
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($articles);
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'No query provided']);
}
?>
