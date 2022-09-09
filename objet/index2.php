<?php

require_once("./class/Car.php");
require_once("./class/Human.php");

// $voiture = new Car("Audi", "TT", "1996");
// $voiture2 = new Car("Porsche", "911 Turbo S", "2022");

// $voiture->congratulations();
// echo $voiture->calculate();

$tiana = new Human();
//$tiana->name="Vola";
//var_dump($tiana);

echo $tiana->setName("Vola");
// var_dump($tiana);

echo $tiana->getName();


// var_dump($voiture);
// var_dump($voiture2);