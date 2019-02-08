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
if (isset($_GET['action']) && isset($_SESSION['id']))
{
    switch ($_GET['action'])
    {
        case 'delete':
            sql_delete_post($bdd, $_GET['id']);
            $all_posts = search_all_posts($bdd);
            require 'views/home.php';
            break;

        case 'update':
            sql_update_post($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload'], $_POST['old-article-img'], $_GET['id']);
            $post = search_single_post($bdd,$_GET['id']);
            require 'views/details.php';
            break;

        case 'create':
            sql_create_post($bdd, $_POST['title'], $_POST['author'], $_POST['categorie'], $_POST['content'], $_FILES['fileToUpload']);
            $all_posts = search_all_posts($bdd);
            require 'views/home.php';
            break;

        case 'update-author':
            sql_update_author($bdd,$_GET['id'], $_POST['firstname'], $_POST['lastname'], $_POST['citation'], $_POST['description'], $_POST['level'], $_POST['old-author-img'], $_FILES['fileToUpload']);
            $all_posts = search_all_posts($bdd);
            if($_SESSION['level'] == 1)
            {
                $all_posts = search_all_posts($bdd);
                $all_authors = search_all_authors($bdd);
                $categories = search_all_categories($bdd);
                require 'views/administration.php'; 
            }
            else
            {
                require 'views/home.php';
            }
            break;
        
        case 'delete-author':
            sql_delete_author($bdd,$_GET['id']);
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php'; 

        case 'create-cat':
            sql_create_cat($bdd, $_POST['name'], $_POST['description'], $_FILES['image']);
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php';
            break;

        case 'update-categorie':
            sql_update_categorie($bdd, $_GET['id'], $_POST['name'], $_POST['description'], $_POST['old-cat-img'], $_FILES['fileToUpload']);
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php';
            break;

        case 'delete-categorie':
            sql_delete_categorie($bdd, $_GET['id']);
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php';
            break;

        case 'create-auth':
            sql_create_auth($bdd, $_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['level'], $_FILES['image']);
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php';
            break;

        case 'add-comment':
            sql_add_comment($bdd, $_POST['post-id'], $_POST['name'], $_POST['mail'], $_POST['comment']);
            header('Location: post-'. $_GET['id'] .'');
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
            $nb_comments = count_comments($bdd, $_GET['id']);
            if($nb_comments['count(*)'] != 0)
            {
                $comments = search_all_comments($bdd, $_GET['id']);
            }
            require 'views/details.php';
            break;

        case 'new-post';
            $all_categories = search_all_categories($bdd);
            $all_authors = search_all_authors($bdd);
            require 'views/newpost.php';
            break;

        case 'update':
            $post = search_single_post($bdd,$_GET['id']);
            $all_categories = search_all_categories($bdd);
            $all_authors = search_all_authors($bdd);
            require 'views/update.php';
            break;
        
        case 'categories':
            $categories = search_all_categories($bdd);
            require 'views/categories.php';
            break;

        case 'auteurs':
            $all_authors = search_all_authors($bdd);
            require 'views/auteurs.php';
            break;

        case 'posts-by-categories';
            $categories_posts = search_posts_by_categories($bdd, $_GET['id']);
            require 'views/posts-by-categories.php';
            break;

        case 'posts-by-authors';
            $all_posts = search_all_posts($bdd);
            $author = $_GET['id'];
            require 'views/posts-by-authors.php';
            break;

        case 'about':
            require 'views/about.php';
            break;

        case 'contact':
            require 'views/contact.php';
            break;
            
        case 'admin';
            $all_posts = search_all_posts($bdd);
            $all_authors = search_all_authors($bdd);
            $categories = search_all_categories($bdd);
            require 'views/administration.php';
            break;

        case 'edit-author':
            $author = search_author($bdd, $_GET['id']);
            require 'views/user-profil.php';
            break;

        case 'edit-categorie';
            $categorie = search_categorie($bdd, $_GET['id']);
            require 'views/edit-cat.php';
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

