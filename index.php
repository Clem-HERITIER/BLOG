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
            sql_update($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload'], $_POST['old-article-img'], $_GET['id']);
            $post = search_single_post($bdd,$_GET['id']);
            require 'views/details.php';
            break;

        case 'create':
            sql_create($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload']);
            $all_posts = search_all_posts($bdd);
            require 'views/home.php';
            break;

        case 'update-user':
            sql_update_user($bdd,$_GET['id'], $_POST['firstname'], $_POST['lastname'], $_POST['citation'], $_POST['description'], $_POST['old-author-img'], $_FILES['fileToUpload']);
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
        case 'archives':
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
        
        case 'categories':
            $categories = search_all_categories($bdd);
            require 'views/categories.php';
            break;

        case 'categories-posts';
            $categories_posts = search_posts_by_categories($bdd, $_GET['id']);
            require 'views/posts-by-categories.php';
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

        case 'user-posts';
            $all_posts = search_all_posts($bdd);
            require 'views/user-posts.php';
            break;
            
        case 'admin';
            require 'views/administration.php';
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

