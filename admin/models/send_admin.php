<?php
// admin/controllers/send_admin.php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if (!isset($_SESSION['nom']) || !isset($_SESSION['prenom']) || !isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header('Location: pages/signup.php?error=' . urlencode("Soumettre le formulaire."));
    exit();
}

// Inclure le fichier de connexion à la base de données
$pdo = include '../config/database.php';

if (!$pdo) {
    die("Erreur de connexion à la base de données.");
}

try {
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $email = $_SESSION['email'];
    $password = password_hash($_SESSION['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    
    $stmt->execute();

    // Rediriger l'utilisateur vers une page de succès
    header('Location: index.php?page=dashboard-copy');
    exit();
} catch (PDOException $e) {
    echo "Erreur d'insertion dans la base de données : " . $e->getMessage();
}
?>
