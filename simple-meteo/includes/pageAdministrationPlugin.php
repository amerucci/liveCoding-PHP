<?php include('functions.php');
$valeurCleApi = recupererCleApiBdd();


if($_GET['action']=="getcommunes"){
    $villes = communespardepartement($_GET['codepostal']);
}
// $cps = $cp['code'];
// var_dump($cp);

?>

<h1>Bienvenue sur ma sur ma page</h1>

<h2>Remplissage de la table communes</h2>
<p>Cliquer sur ce <a href="admin.php?page=simple-meteo%2Fincludes%2FpageAdministrationPlugin.php&action=remplissage">lien</a> pour remplir la table communes</p>

<h2>Saisie de la clé d'API</h2>
<p> <i>Pour générer une clé API rendez-vous sur le site <a href="https://openweathermap.org/" target="blank">OpenWeather</a>.<br/>Créez un compte, puis par la suite rendez-vous dans l'onglet "My API keys".</i></p>
<form action="">
    <input type="hidden" name="page" value="simple-meteo/includes/pageAdministrationPlugin.php">
    <input type="text" name="apikey" id="apikey" value="<?php echo $valeurCleApi["option_value"];?>">
    
    <?php if($valeurCleApi !=""){ ?>
        <button type="submit" name="action" value="updatekey">Mettre à jour</button>
    <?php } else { ?>
        <button type="submit" name="action" value="registerkey">Enregistrer</button>
    <?php } ?>
    
   
</form>

<h2>Selection de la ville</h2>
<form action="">
<input type="hidden" name="page" value="simple-meteo/includes/pageAdministrationPlugin.php">
<label for="codepostal">Commencez par saisir un code départemental</label>
<input type="number" name="codepostal" id="codepostal">
<button type="submit" name="action" value="getcommunes">Suivant</button>
</form>

<form action="">
<input type="hidden" name="page" value="simple-meteo/includes/pageAdministrationPlugin.php">
<label for="ville">Choisissez une ville du département selectionné</label>
<input list="villes" name="ville" id="ville">
<datalist id="villes">
<?php
foreach($villes as $ville){
echo '<option value="'.$ville['nom'].'">';

}
?>
</datalist>
<button type="submit" name="action" value="generateshortcode" id="generate">Enregistrer</button>
</form>

<div id="shortcode"></div><div id="copy">Copier</div>



<?php

$remplissage = $_GET['action'];
if($remplissage =="remplissage"){
    remplissageBDD();
}



if($remplissage =="registerkey"){
    enregistrementCleApiBdd($_GET['apikey']);
    redir('admin.php?page=simple-meteo/includes/pageAdministrationPlugin.php');
}

if($remplissage =="updatekey"){
    miseAJourCleApiBdd($valeurCleApi["option_id"],$_GET['apikey']);
    redir('admin.php?page=simple-meteo/includes/pageAdministrationPlugin.php');
}






global $wpdb;

// echo "<pre>";
// print_r($wpdb);
// echo "</pre>";

?>

<script>
    document.querySelector('#generate').addEventListener('click', function(e){
        e.preventDefault();
        let ville = document.querySelector('#ville').value
        document.querySelector('#shortcode').innerHTML = "[meteo ville="+ville+"]"
    })

    document.querySelector('#copy').addEventListener('click', function(){
        var copyText = document.getElementById("shortcode");

navigator.clipboard.writeText(copyText.innerHTML);
alert("Copied the text: " + copyText.innerHTML);
    })










</script>
