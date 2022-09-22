<?php

require_once('Database.php');

// Ici nous nous retrouvons dans le cerveau de notre application
// En effet toutes les taches, tous les calculs seront retournés ici par notre model au controller qui se chargera de les transmettre à la vue pour les afficher, mais cela nous allons le voi plus tot
// Ici nous allons déclarer une classe, qui contriendra des attributs et des méthodes (fonctions).
// Nous ne retrouverons dans notre classe que des méthodes lui étant propres. Contrairement
// Par exemple il ne sera en aucun cas question d'ajout d'utilisateurs dans une classe livre qui aura pour but elle de ne se consacré qu'aux livres
// Commencons par déclarer notre classe 

class Books extends Database {

    // Nous pouvons lui déclarer des attributs
    // Il existe 3 types d'attributs : public, private, protected. 
    // public : l'attribut est visible par tout le monde.
    // private : l'attribut n'est accessible que par sa classe.
    // protected : l'attribut n'est accessible que par sa classe et ses sous-classes.
    // Pour les attrbuts private nous allons utiliser des Accesseurs et Mutateurs
    // En règle générale, on n'accède pas directement aux attributs d'un objet. Pour lire et modifier leurs valeurs, on passe par des méthodes qui permettent de sécuriser leur utilisation.
    // Ces méthodes s'appellent des accesseurs (getter) pour lire leurs valeurs et des mutateurs (setter) pour modifier leurs valeurs.
    // Une des conventions souvent utilisée et de reprendre le nom de l'attribut pour créer les méthodes, en ajoutant get pour les accesseurs et set pour les mutateurs.
   
    //public $title;
    //public $author

     

    // Nous pouvons créer aussi déclarer un constructeur. Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé.
    // Elle se déclae ainsi : 

    // public function __construct() {
    //     print "Bonjour et bienvenu sur le site";
    // }

    // Maintenant commençons notre exemple
    // Sur notre page d'accueil nous souhaitons récupérer la liste de tous les livres dans notre BDD
    // Pour ce faire nous allons créer un méthode (function) qui aura pour but de récupérer toutes ces informations et les retourner au controller
    // Donc on va devoir commencer par faire hériter notre classe de la classe dataBase afin de pouvoir jouir de la connexion a celle ci

    public function getAllBooks(){
        $books = $this->connect()->prepare("SELECT * FROM lpecom_livres");
        $books->execute();
        return $books->fetchAll();
    }

    public function singleBook($what){
        $books = $this->connect()->prepare("SELECT * FROM lpecom_livres WHERE id_livre = :id");
        $books->bindParam(":id", $what);
        $books->execute();
        return $books->fetch();
    }



}