<?php

require_once '../lib/user-data.lib.php';
include '../html/subscribe.html.php';

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name'])){
    
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    
    //je vérifie que toutes les info du formulaire sont là
    if (!empty($login) && !empty($password) && !empty($name)) {


        if (createUser($login, $password, $name)){
            echo "le compte a été créé.";
            ?> <a href="login.php" >Se connecter</a><?php
        }
        else{
            echo "l'utilisateur existe déjà";
        }
        

    }
    else{
        echo 'Tous vos champs ne sont pas remplis';
    }
}
else{
    echo'Veuillez remplir le formulaire';
}
