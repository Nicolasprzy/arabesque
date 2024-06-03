<?php

// Inclure le fichier de configuration
include 'config.php';

try {
    // Établir la connexion à la base de données SQLite
    $pdo = new PDO('sqlite:' . DATABASE_PATH);
    // Configurer PDO pour afficher les erreurs en mode exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Retourner l'objet PDO pour être utilisé dans d'autres parties du code
    return $pdo;
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message d'erreur et arrêter l'exécution
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
