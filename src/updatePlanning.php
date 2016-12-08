<?php
require '../lib/planning-data.lib.php';




//echo $_POST['lineDate'];

    if (isset($_POST["mettreAJour"])) {
           

        
        if (isset($_POST["Date"]) && isset($_POST["Label"]) && isset($_POST["Teacher"])) {
            $date = $_POST["Date"];
            $label = $_POST["Label"];
            $teacher = $_POST["Teacher"];
            updatePLanning($date, $label, $teacher);
        }
    }
    include('../html/updatePlanning.html.php');

?>
