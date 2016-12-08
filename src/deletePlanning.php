<?php

require '../lib/planning-data.lib.php';



//echo $_POST['lineDate'];


$lineDate = "";
$label = "";
$teacher = "";


 if (isset($_POST["lineDate"])){
    $lineDate = $_POST["lineDate"];

    $infos = getDataAtDate($lineDate);
    if($infos!== null)
    {
        
    $label = $infos['label'];
    $teacher = $infos['teacher'];
    }
 }    
 
 
if (isset($_POST["confirmDelete"])) {


    if (isset($_POST["lineDate"]) && isset($_POST["label"]) && isset($_POST["teacher"])) {
        $lineDate= $_POST["lineDate"];
        $label = $_POST["label"];
        $teacher = $_POST["teacher"];
        deletePLanning($lineDate);

        header("Location: /src/showPlanning.php");
    }
}

include('../html/deletePlanning.html.php');
