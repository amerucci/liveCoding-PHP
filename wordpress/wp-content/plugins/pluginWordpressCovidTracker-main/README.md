# PROJET 10 - Création d'un plugin Wordpress

Dans ce projet il vous sera demandé de créer un plugin wordpress, intégrant dans une base de données les données issues d'une API.
Vous devrez par la suite générer des shortcodes vous permettant d'appeler vos données dans les pages de votre choix.
Il faudra aussi généer un shortcode permettant à l'utilisateur d'afficher une liste et d'afficher des moteurs de recherche pour trier celle-ci

## Récapitulatif des shortcodes : 

[department] : Pour afficher un département choisi
[region] : Pour afficher un région choisie
[departments] : Pour afficher tous les départements
[regions] : Pour afficher toutes les régions
[displayWidthSearchBar] : Pour afficher soit tous les départements, soit toutes les régions en fonction du choix de l'utilisateur, le tout avec un moteur de recherche.

## Récapitulatif du projet : 

Création d'un plugin qui lors de l'activation créra une nouvelle table dans la base de données. Attention il ne faudra en aucun cas devoir re-saisir les identifiants, mdp et autres informations de celle-ci. Il faudra les récupérer automatiquement afin que votre plugin puisse être réutilisable sur un autre site automatiquement.

## Structure de la base de données : 

    id Primaire int(6)
    code    varchar(30) 
    nom varchar(30)
    hospitalises    int(30)
    reanimation int(30)
    nouvellesHospitalisations   int(30)
    nouvellesReanimations   int(30)
    deces   int(30)
    gueris  int(30)

Une fois votre plugin activé un bouton devra être présent donnant la possibilité d'insérer les données issues d'une API dans la table qui vient d'être créée.

L'API a utiliser : 

https://coronavirusapi-france.now.sh/AllLiveData

Votre plugin devra aussi pemettre à l'utilisateur de selectionner le shortcode qu'il souhaite utiliser, qu'il pourra par la suite copier et coller dans la page de son choix.

## Moteur de recherche à afficher en front :

Les moteurs de recherche devront se constituer ainsi : 
- Un champ de recherche libre
- Un select donnant la possibilité de choisir une région (La liste devra être généré automatiquement) (1)
    Des options supplémentaires : 
- Un champ de type nombre pour trier le nombre de personnes hospitalises
- Un champ de type nombre pour trier le nombre de personnes en réaanimation
- Un champ de type nombre pour trier le nombre de nouvelles hospitalisations
- Un champ de type nombre pour trier le nombre de personnes personnes en réanimation
- Un champ de type nombre pour trier le nombre de personnes décédés
- Un champ de type nombre pour trier le nombre de personnes guéries

(1) Attention si la personne a décidé de choisir d'afficher les départements avec un moteur de recherche, le select devra afficher la liste des départements et s’il a choisi les régions, le select devra afficher la liste des régions.

## Développement en option : 

La liste généré suite une recherche via le moteur de recherche peut etre traité en Ajax afin d'éviter un rechargement de la page.

## Livrable attendu : 

Votre code devra être versionné sur GitHub
Votre plugin devra être en visible sur un site en ligne.

Le travail se fera de manière individuelle. Vous n'êtes pas obligé de développer un thème pour votre site. Vous pourrez utiliser un thême existant.

Le développement des fonctionnalités de votre plugin pourra être développées de manière procédurale ou en MVC.

## Ressources pour vous aider dans votre développement : 

Création d'un plugin : 

- https://www.ionos.fr/digitalguide/hebergement/blogs/comment-developper-son-propre-plugin-wordpress/
- https://www.tutowp.fr/comment-creer-un-plugin-wordpress-qui-affiche-un-message-a-la-fin-de-chaque-article/
- https://www.naxialis.com/comment-creer-plugin-wordpress/

Création d'un shortcode :

- https://kode.ch/wordpress/shortcodes-et-bases-de-donnees/

Traiter les données d'une API en PHP

- https://www.php.net/manual/fr/book.curl.php
- https://www.youtube.com/watch?v=vq7yJDuf42E

## Date du projet : 

Du 11/01/2021 au 15/01/2021

