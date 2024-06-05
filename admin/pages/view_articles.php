<?php
session_start();

// Inclusion du fichier de configuration de la base de données
require_once '../config/database.php';

// Fonction pour récupérer les articles depuis la base de données
function getArticles($pdo) {
    try {
        $sql = "SELECT * FROM articles ORDER BY id DESC"; // Trier par ID au lieu de created_at
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur de base de données : " . $e->getMessage());
    }
}

// Récupérer les articles
$articles = getArticles($pdo);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <link rel="stylesheet" href="adminCss/articles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .container {
    width: 80%;
    margin: 20px auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Pour répartir les cartes sur toute la largeur */
}
.article-container {
    display: flex;
    flex-direction: row;
    flex-basis: calc(33.33% - 20px); /* Utilisation de calc() pour définir la largeur de chaque carte */
    margin-bottom: 20px;
}

.article{
    flex-basis: calc(33.33% - 20px); /* Utilisation de calc() pour définir la largeur de chaque carte */
    margin-bottom: 20px;
}

        .article img {
            width: 100%;
            height: auto;
        }
        .article-content {
            padding: 20px;
        }
        .article h2 {
            font-size: 1.5em;
            margin: 0 0 10px;
        }
        .article p {
            margin: 10px 0;
        }
        .article .meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.9em;
            color: #666;
        }
        .read-more {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .read-more:hover {
            background: #0056b3;
        }
        @media screen and (max-width: 768px) {
    .article {
        flex-basis: calc(50% - 20px); /* Deux cartes par ligne pour les petits écrans */
    }
}

@media screen and (max-width: 480px) {
    .article {
        flex-basis: calc(100% - 20px); /* Une carte par ligne pour les écrans très petits */
    }
}
    </style>
</head>
<body>
    <div class="container">
        <div class="container-title">
            <h1>Liste des Articles</h1>
        </div>
        <?php if ($articles): ?>
            <?php foreach ($articles as $article): ?>
                <div class="article-container">
                <div class="article">
                    <?php if ($article['header_image']): ?>
                        <img src="<?php echo htmlspecialchars($article['header_image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                    <?php endif; ?>
                    <div class="article-content">
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                        <div class="meta">
                            <span><?php echo date('d/m/Y', strtotime($article['created_at'])); ?></span>
                            <span>10k vues</span>
                        </div>
                        <p><?php echo htmlspecialchars($article['category']); ?></p>
                        <p><?php echo substr(strip_tags($article['content']), 0, 100); ?>...</p>
                        <a href="index.php?page=article&id=<?php echo $article['id']; ?>" class="read-more">Read Article &rarr;</a>
                    </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>
