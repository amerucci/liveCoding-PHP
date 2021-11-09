<?php
require_once  __DIR__ . '/../Models/Data.php';

/**
 * Get a department by giving his name
 *
 * @param  mixed $atts
 * @return void
 */
function getDepartment($atts)
{
    $whattosearch = "Département";
    $data = new Data;
    $datas = $data->getDepartement($atts);
    require(__DIR__ . "/../Views/list.php");
    return $html;
}

/**
 * Get All the departments
 *
 * @return void
 */
function getAllDepartment()
{
    $whattosearch = "Département";
    $data = new Data;
    $datas = $data->allData();
    require(__DIR__ . "/../Views/list.php");
    return $html;
}

/**
 * Get All the regions
 *
 * @return void
 */
function getAllRegions()
{
    $whattosearch = "Région";
    $data = new Data;
    $datas = $data->regionList();
    require(__DIR__ . "/../Views/list.php");
    return $html;
}

function form($s){
    $whatSearch = $s;
    require (__DIR__."/../Views/search.php");
    return $html;
}


/**
 * Get All the regions with filter
 *
 * @return void
 */
function getAllRegionsFilter()
{
    $data = new Data;
    $datas = $data->search();
    $whattosearch = "Région";
    require(__DIR__ . "/../Views/list.php");
    return $html;
}


/**
 * Get All the department with filter
 *
 * @return void
 */
function getAllWithFilters($what)
{
    $whatSearch = $what;
    $data = new Data;
    $datas = $data->search($whatSearch);
    $whattosearch = $whatSearch;
    require(__DIR__ . "/../Views/list.php");
    return $html;
}