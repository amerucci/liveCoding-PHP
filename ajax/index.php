<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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



?>






<?php

if(isset($_GET['insertData'])){
    $regions = new Data;
    $regions->insertRegion();
    $departments = new Data;
    $departments->insertDepartment();
    $communes = new Data;
    $communes->insertCommune();
}


// echo "<pre>";
// var_dump($liste);
// echo "</pre>";



//Hydratation select pour les regions
$regions = new Data;
$regions = $regions->getRegionsList();




?>


<div class="container">
<form action="">


<select name="region" id="lesregions" class="form-control">
  <option value="" disabled selected>Choisir une région</option>
<?php foreach ($regions as $region) {
      echo '<option value="'.$region["nom"].'">'.$region["nom"].'</option>';
    }
?>

</select>

<select name="departement" id="lesdepartements" class="form-control" hidden>
<option value="" disabled selected>Choisir un département</option>

  
</select>






</form>

  <?php 




echo '
<div class="container"><table class="table">
  <thead class="table-dark">
  <tr>
  <th scope="col">Commune</th>
  <th scope="col">Code Postal</th>
  <th scope="col">Population</th>
  <th scope="col">Département</th>
  <th scope="col">Région</th>
</tr>
  </thead>
  <tbody id="laliste">
  </tbody>
</table></div>'






?>

<a href="?insertData">Insérer les données</a>
<script src="js/script.js"></script>