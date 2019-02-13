<?php

    if(isset($_SESSION) && isset($_POST['lastname'], $_POST['firstname'], $_POST['description'], $_POST['citation']))
    {
        if(strlen($_POST['lastname']) != 0 && strlen($_POST['firstname']) != 0 && strlen($_POST['description']) != 0 && strlen($_POST['citation']) != 0)
        {
            sql_update_author($bdd,$_GET['id'], $_POST['firstname'], $_POST['lastname'], $_POST['citation'], $_POST['description'], $_POST['level'], $_POST['old-author-img'], $_FILES['fileToUpload']);
            if($_SESSION['level'] == 1)
            {
                header('Location: index.php?page=admin');
            }
            else
            {
                require 'controller-page\controller_form_update_author.php';
            }
        }
        elseif (strlen($_POST['lastname']) == 0) 
        {
            $message = "Veuillez remplir le champ NOM";
            if($_SESSION['level'] == 1)
            {
                header('Location: index.php?page=admin');
            }
            else
            {
                require 'controller-page\controller_form_update_author.php';
            }
        }
        elseif (strlen($_POST['firstname']) == 0) 
        {
            $message = "Veuillez remplir le champ PRÉNOM";
            if($_SESSION['level'] == 1)
            {
                header('Location: index.php?page=admin');
            }
            else
            {
                require 'controller-page\controller_form_update_author.php';
            }
        }
        elseif (strlen($_POST['description']) == 0) 
        {
            $message = "Veuillez remplir le champ description";
            if($_SESSION['level'] == 1)
            {
                header('Location: index.php?page=admin');
            }
            else
            {
                require 'controller-page\controller_form_update_author.php';
            }
        }
        elseif (strlen($_POST['citation']) == 0)
        {
            $message = "Veuillez remplir le champ citation";
            if($_SESSION['level'] == 1)
            {
                header('Location: index.php?page=admin');
            }
            else
            {
                require 'controller-page\controller_form_update_author.php';
            }
        }

    }
   
?>