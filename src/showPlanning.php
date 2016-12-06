<html>
<?php
require '../lib/checksession.lib.php'

//defines the constants
define('CSV_FILE', 'formation-planning.csv');
define('OFFSET_INDEX', 0);

// creates an array to keep the data that has to be displayed
$outputData = [];

// creates a row counter
$row = 1;

// loads and reads the CSV file
if (($handle = fopen(CSV_FILE, "r")) !== FALSE)
{
    while (($data = fgetcsv($handle)) !== FALSE)
    {
        // ignores the head row
        if ($data[] == 'date')
        {
            continue;
        }
    }
}
?>
    <head>
    </head>
    <body>
    </body>
</html>

