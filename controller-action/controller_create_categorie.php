<?php

    if(isset($_SESSION) && isset($_POST['name'], $_POST['description'], $_FILES['image']))
    {
        if(strlen($_POST['name']) != 0 && strlen($_POST['description']) != 0 && $_FILES['image'] != null)
        {
            sql_create_cat($bdd, $_POST['name'], $_POST['description'], $_FILES['image']);
            require 'controller-page/controller_administration.php';
        }
        elseif(strlen($_POST['name']) == 0 || strlen($_POST['description']) == 0 || $_FILES['image'] == null) 
        {
            $reponse_create_categorie = "Veuillez remplir tout les champs et choisir une image";
            require 'controller-page/controller_administration.php';
        }
    }

?>