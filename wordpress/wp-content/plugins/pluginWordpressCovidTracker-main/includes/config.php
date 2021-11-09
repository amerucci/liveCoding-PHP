<?php

require_once  __DIR__ . '/Models/Data.php'; 
require_once  __DIR__ . '/Controllers/covidController.php'; 


//A l'installation du plugin on va faire en sorte qu'une table soit créé dans notre base de données si elle n'existe pas
global $wpdb;
$servername = $wpdb->dbhost;
$username = $wpdb->dbuser;
$password = $wpdb->dbpassword;
$dbname = $wpdb->dbname;
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sh = $conn->prepare( "DESCRIBE `covidDatas`");
if ( !$sh->execute() ) {
  $sql = "CREATE TABLE covidDatas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(30) NOT NULL,
    nom VARCHAR(30) NOT NULL,
    date VARCHAR(50),
    hospitalises int(30),
    reanimation int(30),
    nouvellesHospitalisations int(30),
    nouvellesReanimations int(30),
    deces int(30),
    gueris int(30)
 )";
    $conn->exec($sql);
    $conn = null;



} 
 //Ajout de lien de notre plugin dans le menu latéral
add_action( 'admin_menu', 'pluginLink' );
 
function pluginLink()
{
      add_menu_page(
        'Covid Tracker - Admin', //Titre de la page
        'Covid Tracker', //Lien devant être affiché dans la barre latérale
        'manage_options', //Obligatoire pour que ca fonctionne
        'covid_tracker_admin', //Le Slug
        'covid_tracker_admin_page'//Le callBack
    );
}
//Maintenant génération de l'intérieur de la page admin quand le slug est appelé
function covid_tracker_admin_page(){
require_once("admin/covid-tracker-admin.php");
}




/* Shortcode for displaying a particular department */
function shortcode_chosenDepartment($atts){
   $s = isset($atts['s']) ? $atts['s'] : '';
   $view =  getDepartment($s);
   return $view;
}
add_shortcode('department', 'shortcode_chosenDepartment');

/* Shortcode for displaying all departments */
function shortcode_allDepartment(){
   $view =  getAllDepartment();
   return $view;
}
add_shortcode('departments', 'shortcode_allDepartment');

/* Shortcode for displaying all regions */
function shortcode_allRegion(){
   $view =  getAllRegions();
   return $view;
}
add_shortcode('regions', 'shortcode_allRegion');


/* Shortcode for displaying all department width filter */
function shortcode_displayWithSearchBar($atts){
   $s = isset($atts['s']) ? $atts['s'] : '';
   $view = form($s);
   $view .=  getAllWithFilters($s);
   return $view;
}
add_shortcode('displayWidthSearchBar', 'shortcode_displayWithSearchBar');







