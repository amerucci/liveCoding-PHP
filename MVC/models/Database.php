<?php

abstract class Database
{

    
    public function connect() //fonction de connextion à la base
    {
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=livre;port=3306;charset=utf8', 'root', 'root');
            return $bdd;
         
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
        
    
}
