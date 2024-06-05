<?php
session_start();

require_once '../config/database.php';
require_once 'models/deleteArticle.php'; // Assurez-vous que le chemin est correct

// Vérifier si l'ID de l'article est passé en paramètre
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Appeler la fonction de suppression
    $message = deleteArticle($pdo, $articleId);

    // Redirection après la tentative de suppression
    header('Location: index.php?page=articles&message=' . urlencode($message));
    exit();
} else {
    // Redirection en cas d'ID manquant
    header('Location: index.php?page=articles&message=' . urlencode("ID de l'article manquant."));
    exit();
}
?>

