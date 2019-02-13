<?php
session_start();
require ("inc/database.php");
require ("inc/function.php"); 


if (isset($_POST['login']) && isset($_POST['password']))
{
    $user = search_user($bdd, $_POST['login'], $_POST['password']);

    if($user)
    {
        $_SESSION['id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['level'] = $user['level'];
    }
}


if (isset($_GET['StopSession']) && $_GET['StopSession'] == 'yes')
{
    unset($_SESSION['id']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['email']);
    unset($_SESSION['level']);
}


require ("inc/head.php");
require ("inc/header.php"); 
require ("inc/user-pannel.php");


$message ="";
$reponse_create_author = "";
$reponse_create_categorie = "";
$reponse_create_comment = "";



//SUPER CONTROLER
if (isset($_GET['action']) && isset($_SESSION['id']))
{
    switch ($_GET['action'])
    {
        // POSTS
        case 'create':
            require 'controller-action/controller_create_post.php';
            break;

        case 'delete':
            require 'controller-action/controller_delete_post.php';
            break;

        case 'update':
            require 'controller-action/controller_update_post.php';
            break;


        // AUTHORS
        case 'create-author':
            require 'controller-action/controller_create_author.php';
            break;

        case 'update-author':
            require 'controller-action/controller_update_author.php';
            break;
        
        case 'delete-author':
            require 'controller-action/controller_delete_author.php';
            break;


        // CATEGORIES    
        case 'create-categorie':
            require 'controller-action/controller_create_categorie.php';
            break;

        case 'update-categorie':
            require 'controller-action/controller_update_categorie.php';
            break;

        case 'delete-categorie':
            require 'controller-action/controller_delete_categorie.php';
            break;


        // COMMENTS
        case 'add-comment':
            require 'controller-action/controller_create_comment.php';
            break;


    }
}
elseif (isset($_GET['page']))
{
    switch ($_GET ['page'])
    {
        case 'old-posts':
        case 'archives':
            require 'controller-page/controller_archives_posts.php';
            break;

        case 'details':
            require 'controller-page/controller_details_post.php';
            break;

        case 'new-post';
            require 'controller-page/controller_form_create_post.php';
            break;

        case 'update':
            require 'controller-page/controller_form_update_post.php';
            break;
        
        case 'categories':
            require 'controller-page/controller_list_categories.php';
            break;

        case 'auteurs':
            require 'controller-page/controller_list_authors.php';
            break;

        case 'posts-by-categories';
            require 'controller-page/controller_list_posts_by_categories.php';
            break;

        case 'posts-by-authors';
            require 'controller-page/controller_list_posts-by-authors.php';
            break;

        case 'about':
            require 'controller-page/controller_about.php';
            break;

        case 'contact':
            require 'controller-page/controller_contact.php';
            break;
            
        case 'admin';
            require 'controller-page/controller_administration.php';
            break;

        case 'edit-author':
            require 'controller-page/controller_form_update_author.php';
            break;

        case 'edit-categorie';
            require 'controller-page/controller_form_update_categorie.php';
            break;   
            
        case 'api':
            require 'api/api_list_post.php';
            break;
    }
}
else 
{
    $all_posts = search_all_posts($bdd);
    require 'views/home.php';
}


require ("inc/footer.php"); 

?>

