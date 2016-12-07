<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';

if (isConnected() !== TRUE)
{
    header("Location: login.php");
}

$outputData = getData();
$courseAtDate = getDataAtDate();
include('../html/showPlanning.html.php');
