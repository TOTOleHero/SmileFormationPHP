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
    
    return null;
}




/**
 * Créer un nouveau planning
 * @param type $date
 * @param type $cours
 * @param type $nameTeacher
 * @return boolean
 */
function createPLanning($date, $cours, $nameTeacher) {
    $data = loadPlanningData();

    if(getDataAtDate($date) !== null)
    {
        return false;
    }

    $data[] = [
        "date" => $date,
        "label" => $cours,
        "teacher" => $nameTeacher
    ];

    persistPlanningData($data);

    return True;
}
/**
 * Mettre à jour un planning
 * @param type $date
 * @param type $cours
 * @param type $nameTeacher
 * @return boolean
 */

function updatePLanning($date, $cours, $nameTeacher) {
    $data = loadPlanningData();

    foreach ($data as $index => $values) {

        $values[$index]["date"] = $date;
        $values[$index]["cours"] = $cours;
        $values[$index]["nameTeacher"] = $nameTeacher;
    }

    persistPlanningData($data);
    return True;
}


/**
 * Supprimer un planning référencé par sa date
 * @param type $date
 * @return boolean
 */
function deletePLanning($date) {
    $data = loadPlanningData();

    $findIndex = null;

    foreach ($data as $index => $values) {


        if ($values['date'] == $date) {


            $findIndex = $index;

            break;
        }
    }


    if ($findIndex !== null && is_int($findIndex)) {
        unset($data[$findIndex]);
        persistPlanningData($data);

        return True;
    }
    return false;
}

/**
 * persist PHP data on disk (persister les données php dans le dique)
 * @param array $data 
 * [
 *       'date' => string format 'YYYYMMDD',
 *      "label" => string label ,
 *      'teacher'=> string teacher name
 * ]
 */
function persistPlanningData(array $data) {
    file_put_contents(SOURCE_PHP_FILE, serialize($data));
}

/**
 * laod PHP data from disk (charger les donnés php à partir du disque)

 * @return array [][
 *       'date' => string format 'YYYYMMDD',
 *      "label" => string label ,
 *      'teacher'=> string teacher name
 * ]
 */
function loadPlanningData() {



    $rawData = file_get_contents(SOURCE_PHP_FILE);

    $data = unserialize($rawData);

    if (!is_array($data)) {
        return [];
    }
    return $data;
}
