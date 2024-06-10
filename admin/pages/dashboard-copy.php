<?php
session_start();

// Inclusion du fichier de configuration de la base de données
require_once '../config/database.php';
// Inclusion du fichier de fonctions
require_once 'models/get_articles.php';

// Appel de la fonction pour récupérer les articles
$articles = getArticles($pdo);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin -- L'arabesque</title>
    <link rel="stylesheet" href="adminCss/style.css">
    <link rel="stylesheet" href="adminCss/dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fd20aa2b85.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-grid">
        <div class="logo"><img src="../public/img/logo.jpg" alt=""></div>
        <div class="search">
            <div class="container">
                <input type="text" id="searchInput" placeholder="Rechercher des articles...">
                <div id="articles">
                    <!-- Les articles seront affichés ici -->
                </div>
            </div>
        </div>
        <div class="notification">
            <div class="container">
            <i class="fa-solid fa-bell"></i>
            </div>
        </div>
        <div class="header-grid">
            <?php
                include 'pages/header.php';
            ?>
        </div>
        <div class="setting"></div>
        <div class="banner">
            <div class="imgbanner">
                <img src="../public/img/blog1.jpg" alt="">
            </div>
            <div class="titleheader">
                <p>
                    <?php
            if (isset($_SESSION['user'])) {
                // Affiche le prénom de l'utilisateur
                echo "Bonjour, " . $_SESSION['user']['prenom'] . " !";
            } else {
                // Si l'utilisateur n'est pas connecté, affiche un message par défaut
                echo "Bienvenue !";
            }
            ?>
                </p>
                <p class="subtitle">Les outils pour gérer le site de l'école</p>
            </div>
        </div>
        <div class="review_article">
            <div class="articles-container">
                <?php if (is_array($articles)): ?>
                <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <div class="img-container">
                        <img src="../public/img/header/<?php echo htmlspecialchars($article['header_image']); ?>"
                            alt="Image d'entête de l'article">
                    </div>
                    <div class="article-content">
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                    </div>
                    <div class="btn-action">
                        <a href="index.php?page=article_detail&id=<?php echo $article['id']; ?>">Modifier</a>
                        <a href="index.php?page=delete_article&id=<?php echo $article['id']; ?>"
                            id="deleteLink">Supprimer</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <p><?php echo $articles; // Affiche le message d'erreur s'il y en a un ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div class="stats">
            <p>Ici, vous pourrez consulter les statistiques et les informations importantes concernant l'école.</p>
        </div>
    </div>


    <!-- modals -->
    <div id="logoutModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Voulez-vous vraiment vous déconnecter ?</p>
            <div class="center-btn">
                <button class="modal-btn" id="confirmLogoutBtn">Oui</button>
                <button class="modal-btn" id="cancelLogoutBtn">Non</button>
            </div>
        </div>
    </div>
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Voulez-vous vraiment supprimer cet article ?</p>
            <div class="center-btn">
                <button class="modal-btn" id="confirmDeleteBtn">Oui</button>
                <button class="modal-btn" id="cancelDeleteBtn">Non</button>
            </div>
        </div>
    </div>
    <script src="adminJs/scripts.js"></script>
</body>

</html>