<?php

    if(isset($_SESSION) && $_SESSION["id"] = 1)
    {
        $all_posts = search_all_posts($bdd);
        $all_authors = search_all_authors($bdd);
        $categories = search_all_categories($bdd);
        require 'views/administration.php';
    }

?>