# MVC (Model-View-Controller ou Modèle-Vue-Contrôleur)

L'architecture MVC va permette de séparer les parties du site (ou de l'application) en plusieurs morceaux.

Les 3 parties du modèle de conception de logiciel MVC peuvent être décrites comme suit :

- Model (modèle) : gère les données et la logique métier.
- View (vue) : gère la disposition et l'affichage.
- Controller (contrôleur) : achemine les commandes des parties "model" et "view" (le pilotagge). 

Cette architecture va permettre une meilleur sécurisation du code, une maintenabilité plus aisée et assure la cohérence globale du site.

Le principal inconvénient de ce type de structure est la "lourdeur" de sa mise en place.

Au final, le site n'aura plus qu'une seule page, la page index.php

## Création de la structure des données

Pour commencer ce projet nous allons commencer par mettre en place la structre de notre projet avec la création de 3 dossiers

- Controllers : Pour le pilotage / assemblage des pages
- Models : Pour la récupération et la manipulation des données (Classes / Accès Base de Données)
- Views : Pour les parties de code permettant de faie de l'affichage (template, afficahge spécifiques...)

Le fichier Index va jouer le role de routeur. C'est lui qui va diriger la demande de l'utilisateur vers le contröleu du site qui s'occuper de la partie en question.

## Le fichier .htaccess

Pour accéder à notre page d'accueil nous pouvons écrire dans la barre d'adresse : 
http:/:localhost/livecodingmvc/
http:/:localhost/livecodingmvc/index.php
http:/:localhost/livecodingmvc/index.php?page=accueil

Après l'on peut constater que cette méthode n'est pas très optimal et nous souhaitons avoir des urls dites propres.
Pour ce faire nous allons mettre en place un fichier .htaccess qui nous permettra de faire une réécriture d'url.

Toutes nos pages partiront de la page index.php et les urls auront toutes la structure suivante : **index.php?page=**

Pour améliorer l'affichage de nos urls, notre fichier **.htaccess** va réécrire notre url de cette façon : 
http:/:localhost/livecodingmvc/index.php?page=accueil -> http:/:localhost/livecodingmvc/accueil

Voici le contenu du fichie .htaccess

RewriteEngine On <- Ici on lui indique que l'on va procéder à de la réécriture d'url

RewriteCond %{REQUEST_FILENAME} !-f <- condition qui permet d'empecher d'aller directement sur un fichier
RewriteCond %{REQUEST_FILENAME} !-d <- condition qui permet d'empecher d'aller directement sur un dossier

RewriteRule ^(.*)$ index.php?page=$1 <- Ici on indique que l'on veut réécrire toutes nos url


