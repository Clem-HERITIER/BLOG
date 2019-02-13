<?php
    $post = search_single_post($bdd,$_GET['id']);
    $all_categories = search_all_categories($bdd);
    $all_authors = search_all_authors($bdd);
    require 'views/update.php';
?>