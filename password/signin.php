<?php session_start(); 

//Première chose à faire se connecter à la base de données

// Localisation de la BDD
define('HOST', 'localhost');
// Nom d'utilisateur
define('USER', 'root');
// Mot de passe
define('PASSWD', 'root');
// Nom de la base de donnée
define('DBNAME', 'livecoding');

try {
	$db = new PDO("mysql:host=". HOST .";dbname=". DBNAME, USER, PASSWD, [
		// Gestion des erreurs PHP/SQL
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
		// Gestion du jeu de caractères
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		// Choix du retours des résultats
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]);


	//echo 'Base de données connectée';
}
catch (Exception $error) {
	// Attrape une exception
	echo 'Erreur lors de la connexion à la base de données : '. $error->getMessage();
}


?>



<form method="post">
    <input type="text" name="login" placeholder="Entrez votre login" value="">
    <input type="password" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="Se connecter">
</form>

<?php
if(isset($_POST['login']) && isset($_POST['passwd']) && (!empty($_POST['login'])) && (!empty($_POST['passwd']))){
	$login = strip_tags($_POST['login']);
	$passwd = strip_tags($_POST['passwd']);

	//ICI on hash le password pour plus de sécurité
	$passwd = password_hash($passwd, PASSWORD_DEFAULT);

	// On écrit la requête
	$sql = 'INSERT INTO login (login, passwd) VALUES (:login, :passwd)';
	// On prépare la requête
	$query = $db->prepare($sql);
	// On injecte (terme scientifique) les valeurs
	$query->bindValue(':login', $login, PDO::PARAM_STR);
	$query->bindValue(':passwd', $passwd, PDO::PARAM_STR);
	// On exécute la requête
	$query->execute();
}
?>