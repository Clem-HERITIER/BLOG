<?php 
    if(isset($_SESSION))
    {
        sql_delete_post($bdd, $_GET['id']);
        header('Location: index.php?page=admin'); 
    }
?>