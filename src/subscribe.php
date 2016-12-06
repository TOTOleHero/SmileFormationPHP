<?php



$login = $_POST[''];
$password = $_POST[''];
$firstName = $_POST[''];
$lastName = $_POST[''];

//je vérifie que toutes les info du formulaire sont là
if (!empty($login) && !empty($password) && !empty($firstName) && !empty($lastName))   {
 
     
    checkUser();
         
    if (!checkUser())  
    {
        
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
        '<a href="subscribe.php.php"><p class="erreur">Page précédente<p></a>' .
    '</div>'; }
?>