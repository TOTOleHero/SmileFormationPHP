<html>


    <head>
        <meta charset="utf-8" />
        <title>Authentification</title>
    </head>

    <body>
        <p>Please enter your login and password</p><br>


        <a href=" /src/subscribe.php">Create Account</a>

        <?php
        echo $error_msg;
        ?>

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
