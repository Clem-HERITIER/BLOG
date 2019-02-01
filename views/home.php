
<section id="article-container">

    <?php

        // if (isset($_SESSION['id']))
        // {
        //     echo '<a id="new-post" href="index.php?page=new-post">';
        //     echo 'Créer un nouveau post';
        //     echo '</a>';
        // }

        for($i = 0; $i < 5; $i++) 
        {
            if($i == 0)
            {
                $value = $all_posts[$i];

                echo '<article class="first article">';
                echo '<div id="article-header">';
                echo date("d-m-Y", strtotime($value['created_date'])) .' / '. utf8_encode($value['firstname']) .' / '. utf8_encode($value['name']);
                echo '<h2>'. utf8_encode($value['title']) .'</h2>';
                echo '<hr/>';
                echo '<p>'. utf8_encode(substr($value['content'], 0, 200)) .'...</p>';
                echo '<a href="index.php?page=details&id='. $value['id'] .'">lire l\'article</a>';

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

            else
            {
                $value = $all_posts[$i];

                echo '<article class="article">';
                echo '<div class="article-image">';
                echo '<a class="article-bg" style="background: url(img/article-bg/'. $value['image'] .'); background-position: center; background-size: cover" href="index.php?page=details&id='. $value['id'] .'"></a>';
                echo '</div>';
                echo '<div class="article-resume">';
                echo '<div id="article-header">';
                echo date("d-m-Y", strtotime($value['created_date'])) .' / '. utf8_encode($value['firstname']) .' / '. utf8_encode($value['name']);
                echo '</div>';
                echo '<h2>'. utf8_encode($value['title']) .'</h2>';
                echo '<hr/>';
                echo '<p>'. utf8_encode(substr($value['content'], 0, 200)) .'...</p>';
                echo '<a href="index.php?page=details&id='. $value['id'] .'">lire l\'article</a>';

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

        $next_page = 1;

        echo '<a id="all-pages" href="index.php?page=old-posts&id='. $next_page .'">Voir tout les articles...</a>';


    ?>


</section>




    