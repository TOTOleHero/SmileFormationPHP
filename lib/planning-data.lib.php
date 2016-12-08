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
            return $value;
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

    if (getDataAtDate($date) !== null) {
        return false;
    }

    $data[] = [
        "date" => $date,
        "label" => $cours,
        "teacher" => $nameTeacher
    ];



    return persistPlanningData($data);
}

/**
 * Mettre à jour un planning
 * @param type $date
 * @param type $cours
 * @param type $nameTeacher
 * @return boolean
 */
function getPlanningIndex($date) {
    $data = loadPlanningData();

    $findIndex = null;

    foreach ($data as $index => $values) {


        if ($values['date'] == $date) {


            $findIndex = $index;

            break;
        }
    }

    return $findIndex;
}
/**
 *
 * @param string $date format "YYYYMMDD"
 * @param string $label
 * @param string $teacher
 * @return boolean TRUE if updated FALSE otherwise
 */
function updatePLanning($date, $label, $teacher) {

    $data = loadPlanningData();
    $findIndex = getPlanningIndex($date);

    if ($findIndex !== null && is_int($findIndex)) {
        $data[$findIndex]["label"] = $label;
        $data[$findIndex]["teacher"] = $teacher;


        persistPlanningData($data);

        return True;
    }

    return false;
}

/**
 * Supprimer un planning référencé par sa date
 * @param type $date
 * @return boolean
 */
function deletePLanning($date) {

    $data = loadPlanningData();

    $findIndex = getPlanningIndex($date);

    if ($findIndex !== null && is_int($findIndex)) {
        unset($data[$findIndex]);


        return persistPlanningData($data);
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
    if(@file_put_contents(SOURCE_PHP_FILE, serialize($data))=== FALSE)
    {
        echo 'Pb de droit sur le fichier de données';
        return false;
    }
    return true;
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
