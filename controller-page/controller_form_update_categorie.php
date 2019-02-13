<?php

    if(isset($_SESSION))
    {
        $categorie = search_categorie($bdd, $_GET['id']);
        require 'views/edit-cat.php';
    }

?>