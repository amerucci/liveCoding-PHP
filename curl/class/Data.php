<?php

class Data extends Database {



    public function getAll(){
            $datas = $this->connect()->prepare("SELECT * FROM regions");
            $datas->execute();
            $allDatas = $datas->fetchAll(); 
            return $allDatas;
    }

    public function insert($code, $nom){
            $ajouter = $this->connect()->prepare('INSERT INTO regions ( code, nom) VALUES (:code, :nom)');
            $ajouter->bindParam(':code', $code); 
            $ajouter->bindParam(':nom', $nom);
            $ajouter->execute(); 
            $ajouter->debugDumpParams();
            
            //$result = $ajouter->execute();
            //$result->debugDumpParams();
           
}



}