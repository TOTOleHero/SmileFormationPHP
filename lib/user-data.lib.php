<?php
define('USERS_SOURCE_FILE', __DIR__. '/../data/users.serialized-php.data');
define('USER_DATA', __DIR__."/../data/user.csv");
define('INDEX_LOGIN', 0);
define('INDEX_PW', 1);
define('INDEX_ROLE', 2);
define('INDEX_FIRST_N', 3);
define('INDEX_LAST_N', 4);
define('INDEX_EMAIL', 5);
define('INDEX_TEL', 6);

/**
 * @param $login
 * @param $password
 * @param $name
 * @param string $role
 * @return bool
 */
function createUser($login, $password, $name, $role = 'USER') {
    $convertedPassword = getConvertedPassword($password);
    $exist_login = checkUserLoginExist($login);
    if (!$exist_login) {

        $dataToInsert = [
            $login, // login of user
            $convertedPassword, // sha1 of user's password
            $name, // full name for the user
            $role
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

/**
 * @param $login
 * @param $password
 * @return bool
 */
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

/**
 * @param $login
 * @param $role
 * @return bool
 */
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

/**
 * @return array|mixed
 */
function getAllUser() {
    return loadUserData();
}

/**
 * @param $login
 * @return mixed|null
 */
function getUser($login) {
    $allUsers = getAllUser();
    foreach ($allUsers as $value) {
        if ($value['login'] == $login) {
            return $value;
        }
        //var_dump("<pre>", $value);
    }
    return NULL;
}

/**
 * @param array $data
 */
function persistUserData(array $data) {
    file_put_contents(USERS_SOURCE_FILE, serialize($data));
}


/**
 * @return array|mixed
 */
function loadUserData() {
    $rawData = file_get_contents(USERS_SOURCE_FILE);
    $data = unserialize($rawData);
    if(!is_array($data)) {
        return [];
    }
    return $data;
}