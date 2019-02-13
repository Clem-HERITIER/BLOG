<?php

    if(isset($_SESSION))
    {
        $author = search_author($bdd, $_GET['id']);
        require 'views/user-profil.php';
    }

?>