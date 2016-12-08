<?php

require '../lib/planning-data.lib.php';



//echo $_POST['lineDate'];

if (isset($_POST["confirmDelete"])) {


    if (isset($_POST["Date"]) && isset($_POST["Label"]) && isset($_POST["Teacher"])) {
        $date = $_POST["Date"];
        $label = $_POST["Label"];
        $teacher = $_POST["Teacher"];
        deletePLanning($date, $label, $teacher);

        header("Location: /src/showPlanning.php");
    }
    else{
        $date = "";
        $label = "";
        $teacher = "";
    }
}

include('../html/deletePlanning.html.php');
