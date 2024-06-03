<?php
// admin/controllers/controller_admin.php
session_start();
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {
        
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);

        if (empty($nom)) {
            $errors[] = "Le nom est requis.";
        }

        if (empty($prenom)) {
            $errors[] = "Le prénom est requis.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalide.";
        }

        if (strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
        }

        if (!empty($errors)) {
            $errorString = implode('<br>', $errors);
            header("Location: index.php?page=signup?error=" . urlencode($errorString));
            exit();
        } else {
            session_start();
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('Location: index.php?page=send_admin');
            exit();
        }
    } else {
        header('Location: ../pages/signup.php?error=' . urlencode("Tous les champs sont requis."));
        exit();
    }
} else {
    header('Location: ../pages/signup.php?error=' . urlencode("Soumettre le formulaire."));
    exit();
}
?>
