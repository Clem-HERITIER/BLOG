<?php

    if(isset($_SESSION) && isset($_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content']))
    {
          if(strlen($_POST['title']) != 0 && strlen($_POST['author']) != 0 && strlen($_POST['categorie']) != 0 && strlen($_POST['content']) != 0)   
          {
               sql_create_post($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload']);
               header('Location: index.php');
          }
          elseif (strlen($_POST['title']) == 0) 
          {
               $message = "Veuillez rentrer un titre";
               require 'controller-page/controller_form_create_post.php';
          }
          elseif (strlen($_POST['author']) == 0) 
          {
               $message = "Veuillez choisir un auteur";
               require 'controller-page/controller_form_create_post.php';
          }
          elseif (strlen($_POST['categorie']) == 0) 
          {
               $message = "Veuillez choisir une catégorie";
               require 'controller-page/controller_form_create_post.php';
          }
          elseif(strlen($_POST['content']) == 0)
          {
               $message = "Veuillez remplir le corps de l'article";
               require 'controller-page/controller_form_create_post.php';
          }
    }

?>