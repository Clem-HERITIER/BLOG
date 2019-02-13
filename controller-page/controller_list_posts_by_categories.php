<?php
    $categories_posts = search_posts_by_categories($bdd, $_GET['id']);
    require 'views/posts-by-categories.php';
?>