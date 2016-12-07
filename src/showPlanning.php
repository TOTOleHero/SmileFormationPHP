<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';

if (isConnected() === FALSE) {
    header("Location: login.php");
}

$outputData = getData();
include('../html/showPlanning.html.php');
