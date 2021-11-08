<?php 
// Le CURL c'est quoi?
// cURL est une bibliothèque qui vous permet de faire des requêtes HTTP en PHP. 

//Dans ce live Coding nous allons voir comment récupérer en php les informations issues d'une API et les stocker en base de données
//https://geo.api.gouv.fr/decoupage-administratif

//Traitement des données
//Dans un premier temps nous allons récuperer toutes les régions de france

// Tout d'abord il faut vérifier que la méthode CURL soit bien activé sur votre serveur.
// Pour vérifier cela vous pouvez interroger votre serveur grace à un phpinfo()

// phpinfo();
// die;

//Autoloader de Class 

spl_autoload_register(function ($class_name) {
    include './class/'.$class_name . '.php';
});

// On utilisera principalement 4 méthodes
// curl_init : pour initialiser notre curl
// curl_exec : pour executer notre curl
// curl_error : pour récupérer l'erreur
// curl_close : pour fermer notre CURL

$curl = curl_init("https://geo.api.gouv.fr/regions");
//Alors si l'on ne lui spécifie rien le curl_exec lancera le CURL et affichera le résultat.
//Nous ce n'est pas totalement ce que nous souhaitons. 
//Nous allors grace a curl_setopt lui dire que nous souhaitons enregistrer le résultat de ce CURL dans une variable
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$regions = curl_exec($curl);

//var_dump($regions);

if($regions === false){
    echo "<pre>";
    //Si jamais on récupère l'erreur et on la dump
    var_dump(curl_error($curl));
    echo "</pre>";
}
else{
    //Si tout est bon on va décoder le json, et on va dire true pour qu'il y ai un tableau associatif.
    $regions = json_decode($regions, true);

 

   
    if(isset($_GET['insertData'])){
        foreach ($regions as $region) {
            $regionainserer = new Data;
            $regionainserer->insert($region['code'], $region['nom']);
        }
      
    }
    else{
        $regions = new Data;
        $datas = $regions->getAll();
        foreach ($datas as $region) {
            echo "<li>".$region['code']." - ".$region['nom']."</li>";
        }
    }

    //Afficher les informations directement depuis l'API
    // foreach($regions as $ligne){
    //     echo "<li>".$ligne['code']." - ".$ligne['nom']."</li>";
    // }
}
//On termine en fermant la session CURL libérant ainsi la mémoire qui lui était associé
curl_close($curl);

?>

<a href="?insertData">Insérer les données</a>