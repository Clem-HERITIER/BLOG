<section id="article-container">

<?php

    foreach($all_posts as $value)
    {
        if($value['id_auth'] == $_SESSION['id'])
        {
            echo '<article class="article">';
            echo '<div class="article-image">';
            echo '<a class="article-bg" style="background: url(img/article-bg/'. $value['image'] .'); background-position: center; background-size: cover" href="post-='. $value['id'] .'"></a>';
            echo '</div>';
            echo '<div class="article-resume">';
            echo '<div id="article-header">';
            echo date("d-m-Y", strtotime($value['created_date'])) .' / '. utf8_encode($value['firstname']) .' / '. utf8_encode($value['name']);
            echo '</div>';
            echo '<h2>'. utf8_encode($value['title']) .'</h2>';
            echo '<hr/>';
            echo '<p>'. utf8_encode(substr($value['content'], 0, 200)) .'...</p>';
            echo '<a href="post-'. $value['id'] .'">lire l\'article</a>';
            echo '</article>';
        }
    }

?>


</section>



