<?php



class Database
{
   public function connect() //fonction de connextion à la base
 {
     try
     {


        global $wpdb;
        $servername = $wpdb->dbhost;
        $username = $wpdb->dbuser;
        $password = $wpdb->dbpassword;
        $dbname = $wpdb->dbname;

         $bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname.';port=3306;charset=utf8', $username, $password);
        return $bdd; 
      
     }
     catch(Exception $e)
     {
         die('Erreur : '.$e->getMessage());
     }
 }
    
}