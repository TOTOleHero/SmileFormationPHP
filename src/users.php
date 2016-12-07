<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';
require '../lib/user-data.lib.php';

if (isConnected() !== TRUE) {
    header("Location: login.php");
}

$user = getUserSession();

if (!hasRole($user['login'],'ADMIN')) {
    include('../html/notAuthorize.php');
    exit();
}

$outputData = getAllUser();
include('../html/users.html.php');
