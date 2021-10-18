<!-- Ici nous allons faire en sorte que cette page ne soit pas accessible sans que l'utilisateur soit connecté.
Du coup dans un premier temps nous allons vérifier qu'il existe une variable de session preuve que l'utilisateur c'est bien connecté

Mais une variable de session c'est quoi?

Une variable de session PHP est une variable stockée sur le serveur.
C'est une variable temporaire qui a une durée limitée et est détruite à la déconnexion (fermeture du navigateur).
Les variables de session sont partagées par toutes les pages PHP d'une session (accès depuis un même navigateur). Elles permettent donc le passage d'information entre pages.

Maitenant commençons

La première chose à faire est de vérifier qu'il existe une variable de session sur notre serveur, sur laquelle nous allons pouvoir mettre une condition et ainsi faire une redirection vers la page de login oui ou non

Pour pourvoir interroger le serveur nous allons devoir utiliser session_start()
https://www.php.net/manual/fr/function.session-start.php


session_start() crée une session ou restaure celle trouvée sur le serveur, via l'identifiant de session passé dans une requête GET, POST ou par un cookie.
-->

<?php session_start(); 

//$_SESSION['connected'] = true;

//Donc nous allons vérifier si une variable de session connected existe auquel cas on va laisser l'utilisateur accéder à cette page
if(isset($_SESSION['connected'])){
    echo "Bravo, vous vous êtes déjà connecté vous pouvez voir les informations de cette page";
}
//Sinon nous allons le rediriger vers le formulaire de connexion
else{
     header("Location: ./login.php");
}

?>


