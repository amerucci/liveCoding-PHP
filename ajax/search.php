<?php

spl_autoload_register(function ($class_name) {
    include './class/' . $class_name . '.php';
});

if (isset($_GET['region']) && !empty($_GET['region'])) {
    $surquelleregion = $_GET['region'];
    $search = new Data;
    $search = $search->searchDepartement($surquelleregion);
} 

if (isset($_GET['departement']) && !empty($_GET['departement'])) {
    $dequeldepartement = $_GET['departement'];
    $search = new Data;
    $search = $search->displayCommunes($dequeldepartement);
} 



