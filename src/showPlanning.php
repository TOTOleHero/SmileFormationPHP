<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';

if (isConnected() !== TRUE)
{
    header("Location: login.php");
}

$admin=TRUE;


$outputData = getData();
$courseAtDate = getDataAtDate();
include('../html/showPlanning.html.php');
//
//if (isset($_POST["Date"] ) && isset($_POST["Label"] ) && isset($_POST["Formateur"] )){
//    $date=$_POST["Date"];
//    $label=$_POST["Label"];
//    $formateur=$_POST["Formateur"]; 
//    
//    
//    createPlanning($date, $label, $formateur);
//    
//}



updatePLanning($_POST('lineData'));
deletePLanning($_POST('lineData'));
