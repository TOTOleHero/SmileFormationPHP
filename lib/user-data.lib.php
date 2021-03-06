<?php

define('USERS_SOURCE_FILE', __DIR__ . '/../data/users.serialized-php.data');
define('USER_DATA', __DIR__ . "/../data/user.csv");
define('INDEX_LOGIN', 0);
define('INDEX_PW', 1);
define('INDEX_ROLE', 2);
define('INDEX_FIRST_N', 3);
define('INDEX_LAST_N', 4);
define('INDEX_EMAIL', 5);
define('INDEX_TEL', 6);

/**
 * convertit un mot de passe en sha1
 * @param string $password
 * @return string
 */
function getConvertedPassword($password) {
    return sha1($password);
}

/**
 * @return array|mixed
 */
function loadUserData() {
    $rawData = file_get_contents(USERS_SOURCE_FILE);
    $data = unserialize($rawData);
    if (!is_array($data)) {
        return [];
    }
    return $data;
}

/**
 * @param array $data
 */
function persistUserData(array $data) {
    if(@file_put_contents(USERS_SOURCE_FILE, serialize($data))=== FALSE)
    {
        echo 'Pb de droit sur le fichier de données';
        return false;
    }
    return true;
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
    }
    return NULL;
}

/**
 * vérifie que le login existe ou pas
 * @param string $login
 * @return boolean
 */
function checkUserLoginExist($login) {
    if (getUser($login) !== NULL) {
        return TRUE;
    }
    return FALSE;
}

/**
 * @param $login
 * @param $role
 * @return bool
 */
function hasRole($login, $role) {
    $users = getAllUser();
    foreach ($users as $value) {
        if ($value['login'] == $login && $value['role'] == $role) {
            return TRUE;
        }
    }
    return FALSE;
}

/**
 * @param $login
 * @param $password
 * @param $name
 * @param string $role
 * @return bool
 */
function createUser($login, $password, $role = 'USER', $firstName = '', $lastName = '', $email = '', $phone = '') {
    $convertedPassword = getConvertedPassword($password);
    $exist_login = checkUserLoginExist($login);

    if (!$exist_login) {
        $users = loadUserData();

        $users[] = [
            'login' => $login,
            'password' => $convertedPassword,
            'role' => $role,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'tel' => $phone
        ];




        return persistUserData($users);
    }
    else
    {
        echo 'user exist';
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
    $users = getAllUser();
    foreach ($users as $value) {
        if ($value['login'] == $login && $value['password'] == $convertedPassword) {
            return True;
        }
    }
    return False;
}

/**
 * Updates user's data
 * @param $login
 * @param $firstName
 * @param $lastName
 * @param $email
 * @param $phone
 * @return bool
 */
function updateUser($login, $firstName, $lastName, $email, $phone) {
    if (checkUserLoginExist($login) !== TRUE) {
        return FALSE;
    }
    $users = loadUserData();
    $indexUser = null;
    foreach ($users as $index => $values) {
        if ($values['login'] == $login) {
             $indexUser = $index;
            break;
        }
    }
    if ($indexUser !== null && is_int($indexUser)) {
        $users[$indexUser]['firstName'] = $firstName;
        $users[$indexUser]['lastName'] = $lastName;
        $users[$indexUser]['email'] = $email;
        $users[$indexUser]['tel'] = $phone;

        return persistUserData($users);
    }

    echo 'nothing to do';
    return FALSE;
}
