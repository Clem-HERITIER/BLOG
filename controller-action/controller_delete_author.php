<?php
    
    if(isset($_SESSION))
    {
        sql_delete_author($bdd,$_GET['id']);
        header('Location: index.php?page=admin');
    }
   
?>