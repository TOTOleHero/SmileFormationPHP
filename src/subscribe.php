<?php

require '../lib/user-data.lib.php';

if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['name'])){
    
    preg_match("/^[a-zA-Z0-9]+$/", $_POST['login']);
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    
    //je vérifie que toutes les info du formulaire sont là
    if (!empty($login) && !empty($password) && !empty($name)) {

        if (preg_match('/^[a-zA-Z0-9_-]/',$login)){
            if (createUser($login, $password, $name)){
            echo "le compte a été créé.";
            }
            else{
                echo "l'utilisateur existe déjà";
            }
        }
        else{
            echo 'error';
        }
        

    }
    else{
        echo 'Tous vos champs ne sont pas remplis';
    }
}
else{
    echo'Veuillez remplir le formulaire';
}

include '../html/subscribe.html.php';