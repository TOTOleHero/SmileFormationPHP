<?php

define('USER_DATA', "../data/user.csv");
define('INDEX_LOGIN', 0);
define('INDEX_PW', 1);


function createUser($login, $pw, $name) {
    
    $exist_login=checkUserLogin($login);
    $chaine="$login.','.$pw.','.$name";
    
    if(!$exist_login){
          $fp=fopen(USER_DATA,"w"); 
          if($fp){
               fseek($fp,-1,SEEK_END);
                fwrite($fp,$chaine);       
                fclose($fp);
          }
         
    }    
    
    return True;
}
/**
 * vérifie que le login existe ou pas
 * @param string $login
 * @return boolean
 */
function checkUserLogin($login){
    $row = 1; 

    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            // on saute la ligne d'entête en cherchant si la valeur est 'offset'
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }  
            
            if(($login ==  $data[INDEX_LOGIN]) ){
               fclose($handle);
               return True;               
            }                   
        }
        fclose($handle);
    }
    return False;
}

function checkUser($login, $pw) {

    $sha1Password = sha1($pw);

    $row = 1;
   

    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            // on saute la ligne d'entête en cherchant si la valeur est 'offset'
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }  
            
            if(($login ==  $data[INDEX_LOGIN]) && ($sha1Password == $data[INDEX_PW]) ){
               return True;               
            }                   
        }
    }
    return False;
}
?>