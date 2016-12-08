<?php
require '../lib/checksession.lib.php';
require '../lib/planning-data.lib.php';

if (isConnected() !== TRUE)
{
    header("Location: login.php");
}

$admin=TRUE;


$outputData = getData();
$currentPlanningData = getDataAtDate();
$courseAtDate = $currentPlanningData['label'];


$err_message=actions();

/**
 * fonction qui traite des actions admin
 * delete, update, create
 * @return string
 */

function actions() {
    
    $err_message = "";

    if (isset($_POST["delete"])) {
         if (isset($_POST["lineDate"]) ){
             deletePLanning($_POST['lineDate']);             
         }        
       
    } else if (isset($_POST["update"])) {
           

        
//        if (isset($_POST["Date"]) && isset($_POST["Label"]) && isset($_POST["Teacher"])) {
//            $date = $_POST["Date"];
//            $label = $_POST["Label"];
//            $teacher = $_POST["Teacher"];
//            updatePLanning($date, $label, $teacher);
//        }
    } else if (isset($_POST["create"])) {
        if (isset($_POST["Date"]) && isset($_POST["Label"]) && isset($_POST["Teacher"])) {
            $date = $_POST["Date"];
            $label = $_POST["Label"];
            $teacher = $_POST["Teacher"];
            createPLanning($date, $label, $teacher);
             header("Location: /src/showPlanning.php");
        }
    }
    
    return $err_message;
}

// 
// //
//if (isset($_POST["Date"] ) && isset($_POST["Label"] ) && isset($_POST["Formateur"] )){
//    $date=$_POST["Date"];
//    $label=$_POST["Label"];
//    $formateur=$_POST["Formateur"]; 
//    
//    
//    createPlanning($date, $label, $formateur);
//    
//}



//updatePLanning[$date, $cours, $nameFormater];
//deletePLanning($_POST['lineDate']);
include('../html/showPlanning.html.php');