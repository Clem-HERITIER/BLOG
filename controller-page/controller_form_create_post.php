<?php
    $all_categories = search_all_categories($bdd);
    $all_authors = search_all_authors($bdd);
    require 'views/newpost.php';
?>