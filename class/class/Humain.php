<?php
//Déclaration d'une classe. Par convention, on écrit le nom d'une classe en « Upper Camel Case », c'est à dire que tous les mots sont accrochés et chaque première lettre de chaque mot est écrit en capital.

class Humain {

    //Les attributs sont les caractéristiques propres d'un objet. Toute personne possède un nom, un prenom, une date de naissance, une taille, un sexe... Tous ces éléments caractérisent un être humain.
    //Par cet exemple, nous déclarons les attributs de notre classe public.
    //Le mot-clé public permet de rendre l'attribut accessible depuis l'extérieur de la classe. Ce n'est pas forcément une bonne pratique.
    //En programmation orientée objet, un attribut n'est ni plus ni moins qu'une variable.
    
    public $nom;
    public $prenom = "Georges";
    public $datedenaissance;
    private $_couleurdesyeux;
    protected $sexe;
    
    // Il est aussi possible de déclarer des constantes propres à la classe. Contrairement au mode procédural de programmation, une constante est déclarée avec le mot-clé const.
    // Remarque : une constante doit être déclarée et initialisée avec sa valeur en même temps.
    
    const NOMBRE_DE_BRAS = 2;
    const NOMBRE_DE_JAMBES = 2;
    const NOMBRE_DE_YEUX = 2;
    const NOMBRE_DE_PIED = 2;
    const NOMBRE_DE_MAIN = 2;
    
    // ICI ON CREE LE CONSTRUCTUEUR
    //Le constructeur est une méthode particulière. C'est elle qui est appelée implicitement à la création de l'objet (instanciation).
    //Dans notre exemple, le constructeur n'a ni paramètre ni instruction. Le programmeur est libre de définir des paramètres obligatoires à passer au constructeur ainsi qu'un groupe d'instructions à exécuter à l'instanciation de la classe. Nous nous en passerons pour simplifier notre exemple.
    
    public function __construct($prenom, $nom, $datedenaissance, $sexe)
    {
        $this->prenom = $prenom;
        $this->nom= $nom;
        $this->datedenaissance = $datedenaissance; 
        $this->sexe = $sexe;
        
    }
    
    //Mise à jour d'un attribut privé ou protégé : rôle du mutator
    //Le mutator n'est ni plus ni mois qu'une méthode publique à laquelle on passe en paramètre la nouvelle valeur à affecter à l'attribut. Par convention, on nomme ces méthodes avec le préfixe set. Par exemple : setAge(), setPrenom()... C'est pourquoi on entendra plus souvent parler de setter que de mutator.
    //Pour respecter les conventions de développement informatique, nous utilisons dans notre exemple l'écriture au moyen du préfixe set. Mais ce nom est complètement arbitraire et notre méthode aurait très bien pu s'appeller definirNom() ou donnerPrenom(). Il ne tient qu' à vous de donner des noms explicites à vos méthodes.
    
    
    public function setCouleurDesYeux($couleur){
        $this->_couleurdesyeux = $couleur;
    }
    
    //Obtenir la valeur d'un attribut privé ou protégé : rôle de l'accessor
    //On appelle ce type de méthode un accessor ou bien plus communément un getter. En effet, par convention, ces méthodes sont préfixées du mot get qui se traduit en français par « obtenir, récupérer ». Au même titre que les mutators, il est possible d'appliquer n'importe quel nom à un accessor.
    
    public function getCouleurDesYeux(){
        return $this->_couleurdesyeux;
    }
    
    }
?>