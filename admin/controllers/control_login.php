<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Inclusion du fichier de configuration de la base de données
    require_once '../../config/database.php';

    try {
        // Requête SQL pour récupérer les informations de l'utilisateur
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        // Vérification du mot de passe
        if ($user && password_verify($password, $user['password'])) {
            // Authentification réussie, démarrage de la session
            $_SESSION['user'] = [
                'id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'email' => $user['email']
            ];

            // Redirection vers la page d'accueil après connexion
            header('Location: ../index.php?page=dashboard');
            
            exit();
        } else {
            // Identifiants invalides
            // $error_message = "Nom d'utilisateur ou mot de passe incorrect.";
            echo ("erreur identifiants");
        }
    } catch (PDOException $e) {
        // Erreur de base de données
        // $error_message = "Erreur de base de données : " . $e->getMessage();
        echo ("erreur connexion base");
    }
}
?>
