<?php

function redir($url){
    echo '<script language="JavaScript">
    setTimeout("window.location=\''.$url.'\'"); 
    </script>';
   //../acs-weather/includes/plugin_page.php
}

// Connexion à la base de données
function connect(){
    global $wpdb;
    $servername = $wpdb->dbhost;
    $username = $wpdb->dbuser;
    $password = $wpdb->dbpassword;
    $dbname = $wpdb->dbname;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    return $conn;
}


function remplissageBDD(){
    global $wpdb;
    //1ere etape : On supprime ce qu'il y a deja dans la table
    $supprimer = connect()->prepare('Delete from '.$wpdb->base_prefix.'lescommunes');
    $supprimer->execute();
    //2eme étape : On lance le cURL pour récupérer les données de l'API, puis les stocker dans la table
    $curl = curl_init("https://geo.api.gouv.fr/communes");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $communes = curl_exec($curl);
    $communes = json_decode($communes, true);
    foreach ($communes as $commune) {
        $cp = implode(",", $commune['codesPostaux']);
        $ajouter = connect()->prepare('INSERT INTO '.$wpdb->base_prefix.'lescommunes (code, nom) VALUES (:code, :nom)');
        $ajouter->bindParam(':code', $cp);
        $ajouter->bindParam(':nom', $commune['nom']);
        $ajouter->execute();
        
    }
    curl_close($curl);
}


function enregistrementCleApiBdd($key){
    global $wpdb;
    $apik = connect()->prepare(
            'INSERT INTO ' . $wpdb->prefix . 'options (option_name, option_value, autoload) VALUES ("apikey", :option_value, "yes")'
    );
    $apik->bindParam(':option_value', $key);
    $apik->execute();

}

function miseAJourCleApiBdd($id, $key){
    global $wpdb;
    $apik = connect()->prepare('UPDATE ' . $wpdb->prefix . 'options SET option_value = :option_value WHERE option_id = :id');
    $apik->bindParam(':id', $id);
    $apik->bindParam(':option_value', $key);
    $apik->execute();
}




function recupererCleApiBdd(){
    global $wpdb;
    $getapik = connect()->prepare(
            'SELECT * FROM ' . $wpdb->prefix . 'options WHERE option_name="apikey"'
    );
    $getapik->execute();
    return $getapik->fetch();
}


function communespardepartement($codedepartement){
    global $wpdb;
    $ville = connect()->prepare("SELECT * FROM " . $wpdb->prefix . "lescommunes WHERE code like '$codedepartement%' ORDER BY code ASC");
    $ville->execute();
    // $ville->debugDumpParams();
    // die;
    return $ville->fetchAll();

}
