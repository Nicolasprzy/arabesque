<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $title = $_POST['title'];
    $category = $_POST['category'];
    $content = $_POST['content'];

    // Inclusion du fichier de configuration de la base de données
    require_once '../config/database.php';

    // Traitement de l'image d'entête
    $headerImage = $_FILES['headerImage'];
    $headerImagePath = '../public/img/header/' . basename($headerImage['name']);
    move_uploaded_file($headerImage['tmp_name'], $headerImagePath);

    // Enregistrement dans la base de données
    try {
        $sql = "INSERT INTO articles (title, category, content, header_image) VALUES (:title, :category, :content, :header_image)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':title' => $title,
            ':category' => $category,
            ':content' => $content,
            ':header_image' => basename($headerImage['name']) // Only store the image name
        ]);

        // Redirection après succès
        header('Location: index.php?page=dashboard-copy');
        exit();
    } catch (PDOException $e) {
        // Erreur de base de données
        $error_message = "Erreur de base de données : " . $e->getMessage();
    }
}
?>
