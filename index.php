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
}


require ("inc/head.php");
require ("inc/header.php"); 
require ("inc/user-pannel.php");


//SUPER CONTROLER
if (isset($_GET['action']))
{
    switch ($_GET['action'])
    {
        case 'delete':
            sql_delete($bdd, $_GET['id']);
            $all_posts = search_all_posts($bdd);
            require 'views/home.php';
            break;

        case 'update':
            sql_update($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload'], $_POST['old-article-img'], $_POST['article-id']);
            $post = search_single_post($bdd,$_GET['id']);
            require 'views/details.php';
            break;

        case 'create':
            sql_create($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload']);
            $all_posts = search_all_posts($bdd);
            require 'views/home.php';
            break;

    }

}
elseif (isset($_GET['page']))
{
    switch ($_GET ['page'])
    {
        case 'old-posts':
            $page = old_posts_page($_GET['id']);
            $all_posts = search_all_posts($bdd);
            require 'views/old-posts.php';
            break;

        case 'details':
            $post = search_single_post($bdd,$_GET['id']);
            require 'views/details.php';
            break;

        case 'update':
            $post = search_single_post($bdd,$_GET['id']);
            $all_categories = search_all_categories($bdd);
            $all_authors = search_all_authors($bdd);
            require 'views/update.php';
            break;

        case 'new-post';
            $all_categories = search_all_categories($bdd);
            $all_authors = search_all_authors($bdd);
            require 'views/newpost.php';
            break;

        case 'archives':
            require 'views/archives.php';
            break;
        
        case 'categories':
            $categories = search_all_categories($bdd);
            require 'views/categories.php';
            break;

        case 'auteurs':
            $all_authors = search_all_authors($bdd);
            require 'views/auteurs.php';
            break;

        case 'about':
            require 'views/about.php';
            break;

        case 'contact':
            require 'views/contact.php';
            break;
        
        case 'user-profil':
            $all_authors = search_all_authors($bdd);
            require 'views/user-profil.php';
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

