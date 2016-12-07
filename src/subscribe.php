<?php

$login = $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

//je vérifie que toutes les info du formulaire sont là
if (!empty($login) && !empty($password) && !empty($name)){
         
    if (!checkUser($login, $passwordw))  
    {
        createUser($login, $passwordw, $name);
        header('Location: ../html/login.html.php');
    }
    else    {
        echo "<div>" .
            "<p>Ce compte existe déjà</p>".
            "<a href='subscribe.php'><p class='erreur'>Page précédente<p></a>" .
        "</div>"; }
}
else    {
    echo
        '<h2 class="title">Vous n\'avez pas rempli tous les champs!</h2>' .
        '<a href="../html/subscribe.html.php"><p class="erreur">Page precedente<p></a>' .
    '</div>'; }
?>