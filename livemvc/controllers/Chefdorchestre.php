<?php

spl_autoload_register(function ($class_name) {
    include './models/' . $class_name . '.php';
});



function mecfaitjouerplusfort(){
    $lavariablequejappellecommejeveux = new Choeur;
    $cequejedoisfaire =  $lavariablequejappellecommejeveux->plusfort();
    require(__DIR__."/../views/choeurs.php");
    //var_dump($lavariablequejappellecommejeveux);
}

function mecfaitjouermoinsfort(){
    $lavariablequejappellecommejeveux = new Cuivres;
    $lavariablequejappellecommejeveux->moinsfort();
    //var_dump($lavariablequejappellecommejeveux);
    require(__DIR__."/../views/cuivre.php");

}

function jorgesorstoilabaguettedunez(){
    $lavariablequejappellecommejeveux = new Triangle;
    $lavariablequejappellecommejeveux->jesorslabaguette();
    //var_dump($lavariablequejappellecommejeveux);
    require(__DIR__."/../views/triangle.php");

}


