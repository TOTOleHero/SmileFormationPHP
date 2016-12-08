<?php


require_once('../lib/user-data.lib.php');
require_once '../lib/checksession.lib.php';



if (isConnected() !== TRUE) {
    header("Location: login.php");
}


$linkUserOk=false;
$user = getUserSession();


if (hasRole($user['login'],'ADMIN')) {
    
   $linkUserOk=true;  
    
}


include('../html/Accueil.html.php');
