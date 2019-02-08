<section id="article-container">

<?php

    foreach($categories_posts as $value)
    {
        echo '<article class="article">';
        echo '<div class="article-image">';
        echo '<a class="article-bg" style="background: url(img/article-bg/'. $value['image'] .'); background-position: center; background-size: cover" href="index.php?page=details&id='. $value['id'] .'"></a>';
        echo '</div>';
        echo '<div class="article-resume">';
        echo '<div id="article-header">';
        echo date("d-m-Y", strtotime($value['created_date'])) .' / <a href="index.php?page=posts-by-authors&id='. $value['id_auth'] .'">'. utf8_encode($value['firstname']) .'</a> / <a href="index.php?page=posts-by-categories&id='. $value['id_cat'] .'">'. utf8_encode($value['name']) .'</a>';
        echo '</div>';
        echo '<h2>'. utf8_encode($value['title']) .'</h2>';
        echo '<hr/>';
        echo '<p>'. utf8_encode(substr($value['content'], 0, 200)) .'...</p>';
        echo '<a href="index.php?page=details&id='. $value['id'] .'">lire l\'article</a>';
        echo '</article>';
    }    
    
?>


</section>




