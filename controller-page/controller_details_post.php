<?php
        $post = search_single_post($bdd,$_GET['id']);
        $nb_comments = count_comments($bdd, $_GET['id']);
        if($nb_comments['count(*)'] != 0)
        {
            $comments = search_all_comments($bdd, $_GET['id']);
        }
        require 'views/details.php';
?>