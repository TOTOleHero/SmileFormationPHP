<?php

/* Declaration of constants */

// Source data file name
define('SOURCE_CSV_FILE', __DIR__ . '/../data/formation-planning.csv');
define('SOURCE_PHP_FILE', __DIR__ . '/../data/formation-planning.serialized-php.data');

// Start of data
define('DATE_INDEX', 0);
define('LABEL_INDEX', 1);

/*
 * Function that returns an array containing dates in YYYYMMDD format and course name
 */

function getData() {
    return loadPlanningData();
}

function getDataAtDate($date = null) {

    if ($date == null) {
        $date = date("Ymd");
    } elseif (preg_match('/^20\d{2}[01]\d[0123]\d$/', $date) === 0) {
        echo 'Date not valid, format must be YYYYMMDD';
    }

    $data = getData();


    foreach ($data as $value) {
        if ($value['date'] == $date) {
            return $value['label'];
        }
    }
}

function createPLanning($date, $cours, $nameTeacher) {


    $data = loadPlanningData();

    // TEST SI EXIST DEJA


    $data[] = [
        "date" => $date,
        "label" => $cours,
        "teacher" => $nameTeacher
    ];

    persistPlanningData($data);

    return True;
}

function updatePLanning($date, $cours, $nameFormater) {
    
}

function deletePLanning($date) {
    
}

/**
 * persist PHP data on disk
 * @param array $data
 */
function persistPlanningData(array $data) {
    file_put_contents(SOURCE_PHP_FILE, serialize($data));
}

/**
 * laod PHP data from disk

 * @return array
 */
function loadPlanningData() {

    $rawData = file_get_contents(SOURCE_PHP_FILE);

    $data = unserialize($rawData);

    if (!is_array($data)) {
        return [];
    }

    return $data;
}
