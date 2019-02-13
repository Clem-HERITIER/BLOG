<?php
    $all_posts = search_all_posts($bdd);
    $author = $_GET['id'];
    require 'views/posts-by-authors.php';
?>