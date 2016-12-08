<?php
require '../lib/planning-data.lib.php';

 $lineDate = '';
 $label = '';
 $teacher = '';
            
 if (isset($_POST["lineDate"])){
    $lineDate = $_POST["lineDate"];

    $infos = getDataAtDate($lineDate);
    if($infos!== null)
    {
        
    $label = $infos['label'];
    $teacher = $infos['teacher'];
    }
 }           
 // je recupère les informations de ma ligne 
            
            


//echo $_POST['lineDate'];

    if (isset($_POST["mettreAJour"])) {
           

        
        if (isset($_POST["lineDate"]) && isset($_POST["label"]) && isset($_POST["teacher"])) {
            $lineDate = $_POST["lineDate"];
            $label = $_POST["label"];
            $teacher = $_POST["teacher"];
            updatePLanning($lineDate, $label, $teacher);
        }
    }
    include('../html/updatePlanning.html.php');
