<?php session_start();?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="adminCss/signup.css">
        <link rel="stylesheet" href="adminCss/style.css">
    </head>
    <body>
        <?php
            include 'header.php';
        ?>
    
    <div class="container">
        <h2>Inscription</h2>
        <form action="index.php?page=controller_admin" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <script src="adminJs/signup.php"></script>
    </div>

    </body>
    </html>