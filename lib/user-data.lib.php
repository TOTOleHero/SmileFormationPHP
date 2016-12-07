<?php

define('USER_DATA', "../data/user.csv");
define('INDEX_LOGIN', 0);
define('INDEX_PW', 1);
define('INDEX_ROLE', 4);


function createUser($login,$password, $name) {

    $convertedPassword = getConvertedPassword($password);
    
    $exist_login = checkUserLoginExist($login);
    
    if (!$exist_login) {

        $dataToInsert = [
            $login, // login of user
            $convertedPassword, // sha1 of user's password
            $name // full name for the user
        ];

        $fp = fopen(USER_DATA, "a+");
        fputcsv($fp, $dataToInsert);
        fclose($fp);
        return True;
    }

    return False;
}

/**
 * vérifie que le login existe ou pas
 * @param string $login
 * @return boolean
 */
function checkUserLoginExist($login) {
   
    
    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            // on saute la ligne d'entête en cherchant si la valeur est 'offset'
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }

            if ($login == $data[INDEX_LOGIN]) {
                fclose($handle);
                return True;
            }
        }
        fclose($handle);
    }
    return False;
}

function checkUser($login, $password) {

    $convertedPassword = getConvertedPassword($password);

    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

            // on saute la ligne d'entête en cherchant si la valeur est 'offset'
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }

            if ($login == $data[INDEX_LOGIN] && $convertedPassword == $data[INDEX_PW]) {
                return True;
            }
        }
    }
    return False;
}


/**
 * convertit un mot de passe en sha1
 * @param string $password
 * @return string
 */
function getConvertedPassword($password){
   return sha1($password);
}

function hasRole($login, $role)
{
    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }
            if ($data[INDEX_LOGIN] == $login && $data[INDEX_ROLE] == $role) {
                return TRUE;
            }
        }
    }
    return FALSE;
}

function getUser()
{
    return TRUE;
}



?>