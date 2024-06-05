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

</head>

<body>
    <?php
        include 'pages/header.php';
    ?>

    <!-- Content -->
    <main>
        <div class="content">
            <h1>Dashboard</h1>
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
            <p>Ici, vous pourrez consulter les statistiques et les informations importantes concernant l'école.</p>
            <!-- Ajoutez ici le contenu spécifique du tableau de bord, comme des graphiques ou des données importantes -->
        </div>
        <div class="articles-container">
            <?php if (is_array($articles)): ?>
            <?php foreach ($articles as $article): ?>
            <div class="article-card">
                <img src="../public/img/header/<?php echo htmlspecialchars($article['header_image']); ?>"
                    alt="Image d'entête de l'article">
                <div class="article-content">
                    <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                    <p><?php echo html_entity_decode($article['content']); ?></p>
                    <a href="index.php?page=article_detail&id=<?php echo $article['id']; ?>">Lire l'article</a>
                    <a href="index.php?page=delete_article&id=<?php echo $article['id']; ?>"
                        id="deleteLink">Supprimer</a>


                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p><?php echo $articles; // Affiche le message d'erreur s'il y en a un ?></p>
            <?php endif; ?>
        </div>
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
    </main>
    <script src="adminJs/scripts.js"></script>
</body>

</html>