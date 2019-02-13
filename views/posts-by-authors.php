<section id="article-container">

<?php

    foreach($all_posts as $value)
    {
        if($value['id_auth'] == $author)
        {
            echo '<article class="article">';
            echo '<div class="article-image">';
            echo '<a class="article-bg" style="background: url(img/article-bg/'. $value['image'] .'); background-position: center; background-size: cover" href="post-='. $value['id'] .'"></a>';
            echo '</div>';
            echo '<div class="article-resume">';
            echo '<div id="article-header">';
            echo date("d-m-Y", strtotime($value['created_date'])) .' / <a href="index.php?page=posts-by-authors&id='. $value['id_auth'] .'">'. utf8_encode($value['firstname']) .'</a> / <a href="index.php?page=posts-by-categories&id='. $value['id_cat'] .'">'. utf8_encode($value['name']) .'</a>';
            echo '</div>';
            echo '<h2>'. utf8_encode($value['title']) .'</h2>';
            echo '<hr/>';
            echo '<p>'. utf8_encode(substr($value['content'], 0, 200)) .'...</p>';
            echo '<a href="post-'. $value['id'] .'">lire l\'article</a>';

            if (isset($_SESSION['id']))
                {
                    if($_SESSION['level'] != 1 && $_SESSION['firstname'] == $value['firstname'])
                    {
                        echo '<div class="admin">';
                        echo '<a href=index.php?page=update&id='. $value['id'] .'">';
                        echo '<img src="img/edit.png" alt="">';
                        echo '</a>';
                        echo '<a href="index.php?action=delete&id='. $value['id'] .'">';
                        echo '<img src="img/delete.png" alt="">';
                        echo '</a>';
                        echo '</div>';
                    }
                    elseif($_SESSION['level'] == 1)
                    {
                        echo '<div class="admin">';
                        echo '<a href=index.php?page=update&id='. $value['id'] .'">';
                        echo '<img src="img/edit.png" alt="">';
                        echo '</a>';
                        echo '<a href="index.php?action=delete&id='. $value['id'] .'">';
                        echo '<img src="img/delete.png" alt="">';
                        echo '</a>';
                        echo '</div>';
                    }
                }

            echo '</article>';
        }
    }

?>


</section>




