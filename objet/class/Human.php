<?php

class Human {
    private $name = "Tiana";


    public function __construct() {
        echo "Bonjour je suis".$this->name;
     }



public function setName($nompropose){
    $this->name = $nompropose;
}

public function getName(){
    return $this->name;
}

}