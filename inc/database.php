<?php

    try{
            $bdd = new PDO('mysql:host=localhost;dbname=fighthub', 'root');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }

?>