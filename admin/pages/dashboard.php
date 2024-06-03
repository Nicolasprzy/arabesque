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
    <div id="logoutModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>Voulez-vous vraiment vous déconnecter ?</p>
            <div class="center-btn">
                <button class= "modal-btn" id="confirmLogoutBtn">Oui</button>
                <button class= "modal-btn" id="cancelLogoutBtn">Non</button>
            </div>
    </div>
</div>
            <script src="adminJs/scripts.js"></script>
    </body>
</html>
