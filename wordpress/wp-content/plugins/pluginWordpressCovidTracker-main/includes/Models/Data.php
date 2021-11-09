<?php

require_once 'Database.php';

class Data extends Database
{

    public function deleteData(){
       
        $supprimer = $this->connect()->prepare('DELETE From coviddatas');
        $supprimer->execute();
        $this->connect()->query('ALTER TABLE coviddatas AUTO_INCREMENT = 1');
    }


    public function addData($code, $nom, $date, $hospitalises, $reanimation, $nouvelleshospitalisation, $nouvellesreanimations, $deces, $gueris){
     

        $ajouter = $this->connect()->prepare('INSERT INTO coviddatas (code, nom, date, hospitalises, reanimation, nouvellesHospitalisations, nouvellesReanimations, deces, gueris) VALUES (:code, :nom, :date, :hospitalises, :reanimation, :nouvelleshospitalisation, :nouvellesreanimations, :deces, :gueris)');
        $ajouter->bindParam (':code', $code); 
        $ajouter->bindParam (':nom', $nom);
        $ajouter->bindParam (':date', $date);
        $ajouter->bindParam (':hospitalises', $hospitalises);
        $ajouter->bindParam (':reanimation', $reanimation);
        $ajouter->bindParam (':nouvelleshospitalisation', $nouvelleshospitalisation);
        $ajouter->bindParam (':nouvellesreanimations', $nouvellesreanimations);
        $ajouter->bindParam (':deces', $deces);
        $ajouter->bindParam (':gueris', $gueris);
        $ajouter->execute(); 
        
            
    }

    public function allData(){
        $interventions = $this->connect()->prepare('SELECT * FROM coviddatas WHERE code LIKE "DEP-%"');
        $interventions->execute();
        $int = $interventions->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $int;
        //var_dump($int);
    }


    public function getList($whichList){

        switch ($whichList) {
            case 'region':
                $departement = $this->connect()->prepare('SELECT code, nom FROM coviddatas WHERE code LIKE "REG-%"');
                break;

                case 'departement':
                    $departement = $this->connect()->prepare('SELECT code, nom FROM coviddatas WHERE code LIKE "DEP-%"');
                    break;
            
            default:
            $departement = $this->connect()->prepare('SELECT code, nom FROM coviddatas WHERE code LIKE "DEP-%"');
                break;
        }

        
        $departement->execute();
        $dept = $departement->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $dept;
        var_dump($dept);
    }

    public function departmentList(){
        $departement = $this->connect()->prepare('SELECT code, nom FROM coviddatas WHERE code LIKE "DEP-%"');
        $departement->execute();
        $dept = $departement->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $dept;
        var_dump($dept);
    }

    public function regionSelectList(){
        $departement = $this->connect()->prepare('SELECT code, nom FROM coviddatas WHERE code LIKE "REG-%"');
        $departement->execute();
        $dept = $departement->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $dept;
        var_dump($dept);
    }

    public function getDepartement($d){
        $departement = $this->connect()->prepare('SELECT * FROM coviddatas WHERE nom = "'.$d.'"');
        $departement->execute();
        //$departement->debugDumpParams();
        $dept = $departement->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $dept;
        //var_dump($dept);
    }

  

    public function regionList(){
        $departement = $this->connect()->prepare('SELECT * FROM coviddatas WHERE code LIKE "REG-%"');
        $departement->execute();
        $dept = $departement->fetchAll(); //On lui demande de nous retourner dans la variable $int le résultat de notre requête sous forme de tableau.
        return $dept;
        var_dump($dept);
    }

    public function search($what){

        $whatIsSearch = $what;

        switch ($whatIsSearch) {
            case 'Région':
                $specReq = 'AND code LIKE "REG-%"';
                break;

            case 'Département':
                $specReq = 'AND code LIKE "DEP-%"';
                break;
            
            default:
                $specReq = 'AND code LIKE "DEP-%"';
                break;
        }

        $req = array();
        $value = array();

        if(!empty($_GET['departement'])){
            array_push($req, 'AND code LIKE "%"?"%"');
            array_push($value, $_GET['departement']);
        }

        if(!empty($_GET['search'])){
            array_push($req, 'AND nom LIKE "%"?"%"');
            array_push($value, $_GET['search']);
        }

        if(!empty($_GET['region'])){
            array_push($req, 'AND code LIKE "%"?"%"');
            array_push($value, $_GET['region']);
        }

        if(!empty($_GET['hospitalisation'])){
            array_push($req, 'AND hospitalises > ? AND code NOT LIKE "FRA"');
            array_push($value, $_GET['hospitalisation']);
        }

        if(!empty($_GET['reanimation'])){
            array_push($req, 'AND reanimation > ? AND code NOT LIKE "FRA"');
            array_push($value, $_GET['reanimation']);
        }

        if(!empty($_GET['newhospitalisation'])){
            array_push($req, 'AND nouvellesHospitalisations > ? AND code NOT LIKE "FRA"');
            array_push($value, $_GET['newhospitalisation']);
        }

        if(!empty($_GET['newreanimation'])){
            array_push($req, 'AND nouvellesReanimations > ? AND code NOT LIKE "FRA" ');
            array_push($value, $_GET['newreanimation']);
        }

        if(!empty($_GET['gueris'])){
            array_push($req, 'AND gueris > ? AND code NOT LIKE "FRA"');
            array_push($value, $_GET['gueris']);
        }

        if(!empty($_GET['mort'])){
            array_push($req, 'AND deces > ? AND code NOT LIKE "FRA"');
            array_push($value, $_GET['mort']);
        }

        $request = implode(" ", $req);
        $search = $this->connect()->prepare('SELECT * FROM coviddatas WHERE 1=1  '.$request.' '.$specReq.'');
        $search->execute($value);
        $search->debugDumpParams();
        $resultSearch = $search->fetchAll();
        return $resultSearch;
    
    }


}



