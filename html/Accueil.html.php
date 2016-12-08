<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
    </head>

    <body>

        <?php include __DIR__ . '/userName.part.html.php' ?>
        <a href='/src/showPlanning.php'>Voir le Planning</a><br/>
        <?php
        if ($linkUserOk == true) {
            ?>
            <a href='/src/users.php'>Etudiants</a>
            <?php
        }
        ?>

    </body>

</html>
