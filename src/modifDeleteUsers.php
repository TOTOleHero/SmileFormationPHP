<?php

require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';
require '../lib/user-data.lib.php';

if (isConnected() !== TRUE) {
    header("Location: login.php");
}
$user = getUserSession();
if (!hasRole($user['login'], 'ADMIN')) {
    include('../html/notAuthorize.html.php');
    exit();
}



// je recupere les doonnes de l'utilisateur

$userData = [];


// données du formulaire formulaire
if (isset($_GET['login'])) {
    $userData = getUser($_GET['login']);
}


// mise à jour des données
else {
    // je recupere les doonnes du post
    if (isset($_POST['login']) && isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['tel'])) {

        //preg_match("/^[a-zA-Z0-9]+$/", $_POST['login']);
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $email = $_POST['email'];
        $phone = $_POST['tel'];


        // j'appelle le modif du user
        $return_modif = updateUser($_POST['login'], $firstName, $lastName, $email, $phone);

        // j'ajoute un message si KO ou OK
        if ($return_modif !== TRUE) {
            //echo 'Modification non faite';
            $userData = getUser($_POST['login']);
        } else {
            
            //echo 'Modification faite';
         header("Location: /src/users.php");



        }
    }
}

include('../html/modifDeleteUsers.html.php');
