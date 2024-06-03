<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>L'Arabesque - École de Danse</title>
    <link rel="stylesheet" href="css/stylees.css">
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

<!-------------------------- HEADER----------------------------->
    <header data-color="white">
        <?php
            //inclure le header
            include 'pages/header.php';
        ?>
    </header>

    
<!-------------------------- MAIN----------------------------->
    <main >
        <?php 
            // Inclure la première page
            include 'pages/accueil.php';
        ?>   
    </main>



<!-------------------------- FOOTER----------------------------->
    <footer>
        <?php
            include 'pages/footer.php';
        ?>
    </footer>





<!-------------------------- SCRIPT----------------------------->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
    <script src="js/main.js"></script>
    <script src="https://kit.fontawesome.com/fd20aa2b85.js" crossorigin="anonymous"></script>
    
</body>
</html>
