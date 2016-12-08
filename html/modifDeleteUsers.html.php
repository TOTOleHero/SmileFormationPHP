<!DOCTYPE html>
<?php
/*
 * 
 * 
 * 
 * 
 * NOT FINISHED
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
        <title>Modif.Suppr Utilisateur</title>
    </head>

    <body>
        <a href="users.php" >Retour</a>
        <form action="../src/modifDeleteUsers.php" method="post">
        <input type="hidden" name="login" value="<?php echo $userData['login'] ?>"/>
       <p>Login : <?php echo $userData['login']; ?></p>
        <p>Nom : <input type="text" name="lastName" value="<?php echo $userData['lastName']; ?>"/></p>
        <p>Prenom : <input type="text" name="firstName" value="<?php echo $userData['firstName']; ?>" /></p>
        <p>Email : <input type="text" name="email" value="<?php echo $userData['email']; ?>" /></p>
        <p>Telephone : <input type="text" name="tel" value="<?php echo $userData['tel']; ?>" /></p>
        
        <p><input type="submit" value="OK">
        <input type="submit" value="SUPPR"></p>
    </form>
        
    </body>
</html>
