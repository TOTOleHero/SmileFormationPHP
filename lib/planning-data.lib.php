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
    
    return 'In progress';
    
}