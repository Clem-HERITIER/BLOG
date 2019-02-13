<?php

    if(isset($_SESSION) && isset($_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['level']))
    {
        if(strlen($_POST['lastname']) != 0 && strlen($_POST['firstname']) != 0 && strlen($_POST['mail']) != 0 && strlen($_POST['level']) != 0)
        {
            sql_create_auth($bdd, $_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['level'], $_FILES['image']);
            require 'controller-page/controller_administration.php';
        }
        elseif(strlen($_POST['lastname']) == 0 || strlen($_POST['firstname']) == 0 || $_POST['mail'] == null) 
        {
            $reponse_create_author = "Veuillez remplir tout les champs";
            require 'controller-page/controller_administration.php';
        }
    }

?>