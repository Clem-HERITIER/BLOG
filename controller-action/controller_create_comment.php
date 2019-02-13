<?php

    if(isset($_POST['name'], $_POST['mail'], $_POST['comment']))
    {
        
        if(strlen('name') == 0)
        {
            $reponse_create_comment = "Veuillez indiquez votre nom";
            require 'controller-page/controller_details_post.php';
        }
        elseif(strlen('name') >= 15)
        {
            $reponse_create_comment = "Votre nom est trop long, veuillez en choisir un de moins de 15 caractères";
            require 'controller-page/controller_details_post.php';
        }
        elseif(!preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['mail'] ) )
        {
            $reponse_create_comment = "Veuillez saisir une adresse email valide";
            require 'controller-page/controller_details_post.php';
        }
        elseif(strlen($_POST['comment']) <= 20)
        {
            $reponse_create_comment = "Votre commentaire est trop court";
            require 'controller-page/controller_details_post.php';
        }
        elseif(strlen($_POST['name']) != 0 && strlen($_POST['mail']) !=0 && strlen($_POST['comment']) != 0)
        {
            sql_add_comment($bdd, $_POST['post-id'], $_POST['name'], $_POST['mail'], $_POST['comment']);
            header('Location: post-'. $_GET['id'] .'');
            require 'controller-page/controller_details_post.php';
        }
    }
    
?>
