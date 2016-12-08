<?php

require '../lib/planning-data.lib.php';

$lineDate = "";
$label = "";
$teacher = "";

if (isset($_POST["lineDate"])) {
    $lineDate = $_POST["lineDate"];

    $infos = getDataAtDate($lineDate);
    if ($infos !== null) {

        $label = $infos['label'];
        $teacher = $infos['teacher'];
    }
}
// je recupère les informations de ma ligne 
//echo $_POST['lineDate'];

$err_message = '';

if (isset($_POST["action"]) && $_POST["action"] == 'update') {
    
    if (isset($_POST["lineDate"]) && isset($_POST["label"]) && isset($_POST["teacher"])) {
        $lineDate = $_POST["lineDate"];
        $label = $_POST["label"];
        $teacher = $_POST["teacher"];
        if (updatePLanning($lineDate, $label, $teacher)) {
            header("Location: /src/showPlanning.php"); 
            exit();
        }
        else
        {
            $err_message = 'Modification non effectuée';
        }
        
        
    }
}
include('../html/updatePlanning.html.php');
