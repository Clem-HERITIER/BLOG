<?php
    $page = old_posts_page($_GET['id']);
    $all_posts = search_all_posts($bdd);
    require 'views/old-posts.php';
?>