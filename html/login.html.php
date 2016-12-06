<html>


    <head>
        <meta charset="utf-8" />
        <title>Authentification</title>
    </head>

    <body>
        <p>Veuillez entrer l'identifiant et le mot de passe :</p>
        <?php 
          if (isset($error_msg)){
            echo $error_msg;
        }?>

        <form action="login.php" method="post">
            <p> 
                ID :<input type="text" name="login" /> <br />
                Password :<input type="password" name="password" /> <br />
                <input type="submit" value="Valider" />
            </p>
            <p>


            </p>
        </form>
    </body>

</html>
