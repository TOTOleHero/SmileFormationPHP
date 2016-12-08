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
    if(!is_array($data)) {
        return [];
    }
    return $data;
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
function createUser($login, $password, $role = 'USER', $firstName, $lastName, $email, $phone) {
    $convertedPassword = getConvertedPassword($password);
    $exist_login = checkUserLoginExist($login);
    if (!$exist_login) {
        $users = getAllUser();
        $users[] = [
            $login, $convertedPassword, $role, $firstName, $lastName, $email, $phone
        ];
        return True;
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
            break;
        }
    }
    if($indexUser !== null && is_int($indexUser)) {
        $users[$indexUser]['firstName'] = $firstName;
        $users[$indexUser]['lastName'] = $lastName;
        $users[$indexUser]['email'] = $email;
        $users[$indexUser]['tel'] = $tel;
        persistUserData($users);
        return TRUE;
    }
    return FALSE;
}