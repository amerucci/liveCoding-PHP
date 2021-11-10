<?php

class Data extends Database
{


        // Ici nous allons faire en sorte de récupérer toutes les données issues de plusieurs tables dans le cas ou la requete est capable de trouver une entrée commune à chacune des tables
                
        /**
         * getAll
         *
         * @return void
         */
        public function getAll()
        {
                $datas = $this->connect()->prepare(
                        "SELECT
                                communes.nom AS nom_commune,
                                communes.codesPostaux AS cp_commune,
                                communes.population AS population_commune,
                                departements.nom AS nom_departement,
                                regions.nom AS nom_region
                         FROM
                         regions,
                         departements,
                         communes
                         WHERE
                        regions.code = departements.codeRegion
                        AND
                        departements.code = communes.codeDepartement
                        AND departements.nom = 'jura'
                        LIMIT 10
                        "
                );
                $datas->execute();
                $allDatas = $datas->fetchAll();
                $allDatasJSON = json_encode($allDatas);
                echo $allDatasJSON;
        }
        
        /**
         * Insérer une région en BDD
         *
         * @return void
         */
        public function insertRegion()
        {
                $supprimer = $this->connect()->prepare('Delete from regions');
                $supprimer->execute();
                $curl = curl_init("https://geo.api.gouv.fr/regions");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $regions = curl_exec($curl);
                $regions = json_decode($regions, true);
                foreach ($regions as $region) {

                        $ajouter = $this->connect()->prepare('INSERT INTO regions ( code, nom) VALUES (:code, :nom)');
                        $ajouter->bindParam(':code', $region['code']);
                        $ajouter->bindParam(':nom', $region['nom']);
                        $ajouter->execute();
                        //$ajouter->debugDumpParams();
                }
                curl_close($curl);
        }

        public function insertDepartment()
        {
                $supprimer = $this->connect()->prepare('Delete from departements');
                $supprimer->execute();
                $curl = curl_init("https://geo.api.gouv.fr/departements");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $regions = curl_exec($curl);
                $regions = json_decode($regions, true);
                foreach ($regions as $region) {
                        $ajouter = $this->connect()->prepare('INSERT INTO departements ( code, nom, codeRegion) VALUES (:code, :nom, :coderegion)');
                        $ajouter->bindParam(':code', $region['code']);
                        $ajouter->bindParam(':nom', $region['nom']);
                        $ajouter->bindParam(':coderegion', $region['codeRegion']);
                        $ajouter->execute();
                        //$ajouter->debugDumpParams();
                }
                curl_close($curl);
        }

        public function insertCommune()
        {
                $supprimer = $this->connect()->prepare('Delete from communes');
                $supprimer->execute();
                $curl = curl_init("https://geo.api.gouv.fr/communes");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $regions = curl_exec($curl);
                $regions = json_decode($regions, true);
                foreach ($regions as $region) {
                        $cp = implode(",", $region['codesPostaux']);
                        $ajouter = $this->connect()->prepare('INSERT INTO communes ( code, nom, codesPostaux, population, codeDepartement) VALUES (:code, :nom, :codesPostaux, :population, :codeDepartement)');
                        $ajouter->bindParam(':code', $region['code']);
                        $ajouter->bindParam(':nom', $region['nom']);
                        $ajouter->bindParam(':codeDepartement', $region['codeDepartement']);
                        $ajouter->bindParam(':codesPostaux', $cp);
                        $ajouter->bindParam(':population', $region['population']);
                        $ajouter->execute();
                        $ajouter->debugDumpParams();
                }
                curl_close($curl);
        }

        public function getRegionsList()
        {
                $data = $this->connect()->prepare('SELECT nom FROM regions LIMIT 100');
                $data->execute();
                $datas = $data->fetchAll();
                return $datas;
        }

        public function getCommunesList()
        {
                $data = $this->connect()->prepare('SELECT nom, codesPostaux FROM communes LIMIT 100');
                $data->execute();
                $datas = $data->fetchAll();
                return $datas;
        }


        public function getDepartementList()
        {
                $data = $this->connect()->prepare('SELECT nom FROM departements LIMIT 100');
                $data->execute();
                $datas = $data->fetchAll();
                return $datas;
        }

        public function searchDepartement($what)
        {
                $datas = $this->connect()->prepare(
                        "SELECT
                                departements.nom AS nom_departement,
                                regions.nom AS nom_region
                         FROM
                         regions,
                         departements
                         WHERE
                        regions.code = departements.codeRegion
                        AND regions.nom = '$what'
                        GROUP BY nom_departement
                        "
                );
                $datas->execute();
                $allDatas = $datas->fetchAll();
             
                //On encode en JSON pour que Javascript puisse lire et interpréter les résultats
                $allDatasJSON = json_encode($allDatas);
                //On affiche les résultats
                echo $allDatasJSON;
        }

        public function displayCommunes($dequeldepartement)
        {
                $datas = $this->connect()->prepare(
                        "SELECT
                                communes.nom AS nom_commune,
                                communes.codesPostaux AS cp_commune,
                                communes.population AS population_commune,
                                departements.nom AS nom_departement,
                                regions.nom AS nom_region
                         FROM
                         regions,
                         departements,
                         communes
                         WHERE
                        regions.code = departements.codeRegion
                        AND
                        departements.code = communes.codeDepartement
                        AND departements.nom = '$dequeldepartement'
                        LIMIT 100
                        "
                );
                $datas->execute();
                $allDatas = $datas->fetchAll();
                $allDatasJSON = json_encode($allDatas);
                echo $allDatasJSON;
        }
}
