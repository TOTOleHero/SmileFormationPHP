<?php

/**
 * Créer une session pour un user
 *
 * @param array $user
 *          [
 *              "login" => string login
 *              "firstName"=> string firstName
 *              "lastName" => string lastName
 *              "role" => string Role  ("ADMIN" ou "USER")
 *              "email" => string email
 *              "tel" => string tel
 *          ]
 * @return boolean si la session est créée
 */
function createSession(Array $user) {


    session_start();

    $_SESSION["connected"] = true;
    $_SESSION["user"] = $user;

    return true;
}

/**
 * get user data from session
 * @return array User informations
 *          [
 *              "login" => string login
 *              "firstName"=> string firstName
 *              "lastName" => string lastName
 *              "role" => string Role  ("ADMIN" ou "USER")
 *              "email" => string email
 *              "tel" => string tel
 *          ]
 */
function getUserSession() {
    if (session_id() == "") {
        session_start();
    }
    if (isset($_SESSION["user"]) && is_array($_SESSION["user"])) {
        return $_SESSION["user"];
    }
    return [];
}

/**
 * détruit la session en cours
 * @return boolean
 */
function destroySession() {
    session_start();
    // empty data
    $_SESSION = array();

    // destroy session
    session_destroy();

    return true;
}

/**
 * check if user is connected
 *
 * @return boolean true if connected, false otherwhise
 */
function isConnected() {

    session_start();

    if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {
        return true;
    }
    return false;
}
