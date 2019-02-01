<?php

if (isset($_SESSION['id']))
{
    echo '<div id="user-panel">';
    echo '<h3>Bonjour '. $_SESSION['firstname'] .' !</h3>';
    echo '<hr>';
    echo '<a href="index.php?page=user-profil">Mon profil</a>';
    echo '<a href="index.php?page=user-articles">Mes articles</a>';
    echo '<hr>';
    echo '<a id="new-post" href="index.php?page=new-post">Créer un nouveau post</a>';
    echo '</div>';
}

?>