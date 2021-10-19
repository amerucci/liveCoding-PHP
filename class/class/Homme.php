<?php
require_once('Humain.php');

class Homme extends Humain {

    protected $sexe = "Homme";

    public function __construct($prenom, $nom, $datedenaissance)
    {
        parent::__construct($prenom, $nom, $datedenaissance, $this->sexe);
    }

}