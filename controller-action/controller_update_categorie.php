<?php

    if(isset($_SESSION) && isset($_POST['name'], $_POST['description'], $_FILES['image']))
    {
        if(strlen($_POST['name']) != 0, strlen($_POST['description']) != 0, strlen($_FILES['image']) != 0)
        {
            sql_update_categorie($bdd, $_GET['id'], $_POST['name'], $_POST['description'], $_POST['old-cat-img'], $_FILES['fileToUpload']);
            header('Location: index.php?page=admin');
        }
        elseif (strlen($_POST['name']) == 0) 
        {
            $reponse ="Veuillez remplir le champ NOM";
            header('Location: index.php?page=admin');
        }
        elseif (strlen($_POST['description']) == 0) 
        {
            $reponse ="Veuillez remplir le champ DESCRIPTION";
            header('Location: index.php?page=admin');
        }
        elseif (strlen($_FILES['image']) == 0) 
        {
            $reponse ="Veuillez choisir une image";
            header('Location: index.php?page=admin');
        }
    }



?>