<?php
// Tableau des prénom
$a[] = "Pauline";
$a[] = "Antoine";
$a[] = "Jorge";
$a[] = "Vincent";
$a[] = "Karolos";
$a[] = "Bernard";
$a[] = "Julien";
$a[] = "Tiana";
$a[] = "Chris";
$a[] = "Léo";
$a[] = "Natan";
$a[] = "Hamza";
$a[] = "Alain";
$a[] = "Loic";




// On récupère la valeur de saisie dans l'url
$saisie = $_REQUEST["saisie"];

$suggestion = "";



if ($saisie !== "") {
  $saisie = strtolower($saisie);//On transforme en minuscule
  $len=strlen($saisie); //Calcule la taille d'une chaîne 
  foreach($a as $name) {
    if (stristr($saisie, substr($name, 0, $len))) {
      if ($suggestion === "") {
        $suggestion = $name;
      } else {
        $suggestion .= ", $name";
      }
    }
  }
}

// Si'il n'y a pas de suggestion
echo $suggestion === "" ? "pas de suggestion" : $suggestion;
?>