<!DOCTYPE html>
<?php
/*
 * 
 * 
 * 
 * 
 * NOT FINISHED reste suppr user
 * 
 * 
 * 
 * 
 * 
 */
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Smile - utilisateurs.</title>
        <style>
            table
            {
                border:3px solid black;
            }
            table td
            {
                border:3px solid black;
            }
        </style>
    </head>
    <body>

        <?php include __DIR__ . '/userName.part.html.php' ?>

        <a href="/src/Accueil.php" >Accueil</a>

        <table>
            <tr><th>login</th><th>prenom</th><th>nom</th><th>rôle</th><th>Email</th><th>téléphone</th><th></th></tr>
            <?php
            foreach ($outputData as $outputLine) :
                ?>
                <tr>
                    <td><?php echo $outputLine['login'] ?></td>
                    <td><?php echo $outputLine['firstName'] ?></td>
                    <td><?php echo $outputLine['lastName'] ?></td>
                    <td><?php echo $outputLine['role'] ?></td>
                    <td><?php echo $outputLine['email'] ?></td>
                    <td><?php echo $outputLine['tel'] ?></td>
                    <td><a href="./modifDeleteUsers.php?login=<?php echo $outputLine['login'] ?>">modifier</a></td>
                </tr>
<?php endforeach ?>
        </table>
    </body>
</html>