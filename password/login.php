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
    <input type="passwd" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="Se connecter">
</form>

<?php
if(isset($_POST['login']) && isset($_POST['passwd']) && (!empty($_POST['login'])) && (!empty($_POST['passwd']))){
	$login = strip_tags($_POST['login']);
	$passwd = strip_tags($_POST['passwd']);
	//ICI on hash le password pour plus de sécurité

	// On écrit la requête
	$sql = 'SELECT * FROM login WHERE login = :login';
	// On prépare la requête
	$query = $db->prepare($sql);
	// On injecte (terme scientifique) les valeurs
	$query->bindValue(':login', $login, PDO::PARAM_STR);
	// On exécute la requête
	$user = $query->execute();
    

    $user = $query->fetch(PDO::FETCH_ASSOC);
   
    //Première étape nous allons vérifier si l'utlisateur existe bel et bien
    if(!$user){
        echo 'Désolé cet utilisateur n\'existe pas!';
    }else{
        //On utilise password_verify pour s'assurer que le mot de passe saisie est bien celui que nous avons en crypté dans la base de données
        if (password_verify( $passwd, $user['passwd'])) {
            //Si c'est bon nous créons notre variable de session et faisons la redirection.
            $_SESSION['connected']=true;
            header('location: ./index.php');
        
        } else {
            echo 'Le mot de passe est invalide.';
        }
    }
}
?>