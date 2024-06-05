<?php
session_start();

// Inclusion du fichier de configuration de la base de données
require_once '../config/database.php';
// Inclusion du fichier de fonctions
require_once 'models/get_articles.php';

// Vérification de l'ID de l'article
if (!isset($_GET['id'])) {
    header('Location: index.php?page=articles&message=ID de l\'article manquant.');
    exit();
}

// Récupération de l'ID de l'article
$articleId = $_GET['id'];

// Appel de la fonction pour récupérer les détails de l'article
$article = getArticleById($pdo, $articleId);

if (!$article) {
    header('Location: index.php?page=articles&message=Article non trouvé.');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'Article - <?php echo htmlspecialchars($article['title']); ?></title>
    <link rel="stylesheet" href="adminCss/style.css">
    <link rel="stylesheet" href="adminCss/article_detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fd20aa2b85.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'pages/header.php'; ?>

    <div class="container">

        <div class="hero-header">
            <img src="../public/img/header/<?php echo htmlspecialchars($article['header_image']); ?>"
                alt="Image d'entête de l'article">
            <h1 class="article-quill-title"><?php echo htmlspecialchars($article['title']); ?></h1>
        </div>

        <div class="article-quill-content">
        <a href="index.php?page=dashboard"> <- Retour au dashboard</a>
                <?php echo html_entity_decode($article['content']); ?>
            <!-- Ajoutez ici du contenu pour la deuxième colonne si nécessaire -->
        </div>
    </div>
</body>

</html>