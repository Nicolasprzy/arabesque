<?php

session_start();


// Fonction pour vérifier si l'utilisateur est connecté
function isUserLoggedIn() {
    return isset($_SESSION['user']);
}

// Fonction simple de routage
function route($page) {
    $controllerPath = __DIR__ . '/controllers/' . $page . '.php';
    $viewPath = __DIR__ . '/pages/' . $page . '.php';
    $modelsPath = __DIR__ . '/models/' . $page . '.php';

    // Inclure le contrôleur s'il existe
    if (file_exists($controllerPath)) {
        include $controllerPath;
    }

    // Inclure le modèle s'il existe
    if (file_exists($modelsPath)) {
        include $modelsPath;
    }

    // Inclure la vue s'il existe
    if (file_exists($viewPath)) {
        include $viewPath;
    } else {
        include __DIR__ . '/pages/404.php'; // Page 404 si la vue n'existe pas
    }
}

// Récupérer la page à afficher depuis l'URL
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Vérifier si l'utilisateur est connecté avant d'appeler la fonction de routage
if (!isUserLoggedIn() && $page !== 'login') {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: index.php?page=login');
    exit();
}

// Appeler la fonction de routage
route($page);
?>
