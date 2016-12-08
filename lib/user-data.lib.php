<?php

define('USER_DATA', __DIR__."/../data/user.csv");

define('INDEX_LOGIN', 0);
define('INDEX_PW', 1);
define('INDEX_FIRST_N', 2);
define('INDEX_LAST_N', 3);
define('INDEX_ROLE', 4);
define('INDEX_EMAIL', 5);
define('INDEX_TEL', 6);


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
function getConvertedPassword($password) {

   return sha1($password);

}

function hasRole($login, $role) {
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


function getUser($login)
{
    $allUsers = getAllUsers();
    foreach ($allUsers as $value) {

    }
    return ;
}

function getAllUser() {

    $allUser = [][];

    if (($handle = fopen(USER_DATA, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[INDEX_LOGIN] == 'login') {
                continue;
            }
            for ($row = 0; $row < count($data) - 1; $row++) {
                $allUser[row]['login'] = $data[INDEX_LOGIN];
                $allUser[row]['role'] = $data[INDEX_ROLE];
                $allUser[row]['firstName'] = $data[INDEX_FIRST_N];
                $allUser[row]['lastName'] = $data[INDEX_LAST_N];
                $allUser[row]['email'] = $data[INDEX_EMAIL];
                $allUser[row]['tel'] = $data[INDEX_TEL];
            }
        }
        return allUser;
    }
}

