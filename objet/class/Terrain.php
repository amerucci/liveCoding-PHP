<?php

class Terrain {
    public $name = 'mon super terrain';
    public $superficie;
    public $largeur;
    public $longueur;

    public function __construct($longueur, $largeur) {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->superficie = ($this->longueur * $this->largeur);
     }



public function setName($nompropose){
    $this->name = $nompropose;
}

public function getName(){
    return $this->name;
}

}