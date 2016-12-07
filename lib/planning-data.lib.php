<?php


/*Declaration of constants*/

// Source data file name
define('SOURCE_CSV_FILE', '../data/formation-planning.csv');

// Start of data
define('DATE_INDEX', 0);
define('LABEL_INDEX', 1);

/*
 * Function that returns an array containing dates in YYYYMMDD format and course name
 */
function getData() {
    $outputData = [];


    // Load and read each line of the CSV file
    // Build the data table
    if (($handle = fopen(SOURCE_CSV_FILE, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            
            if ($data[DATE_INDEX] == 'date') {
                continue;
            }
      
            $outputData[] = [
                        'date' => $data[DATE_INDEX],
                        'label' => $data[LABEL_INDEX]
            ];
        }

            // References data table
            return $outputData;
        }
} 



function getDataAtDate($date = null){
    
    if ($date == null){
        $date = date("Ymd");
    }elseif (preg_match('/^20\d{2}[01]\d[0123]\d$/', $date) === 0) {
        echo 'Date not valid, format must be YYYYMMDD';        
    }
    
    $data = getData();

    
    foreach ($data as $value) {
        if ($value['date'] == $date){
            return $value['label'];
        }
    }
     
    
}

function createPLanning(){
    
}

function updatePLanning(){
    
}
function deletePLanning(){
    
}