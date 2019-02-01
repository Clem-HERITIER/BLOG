
<section id="article-container">

<?php

    // if (isset($_SESSION['id']) && $page == 1)
    // {
    //     echo '<a id="new-post" href="index.php?page=new-post">';
    //     echo 'Créer un nouveau post';
    //     echo '</a>';
    // }

    $last_post = $page*5;
    $post = (($page*5)-5);
    $nb_posts = count($all_posts);


    for($post ; $post < $last_post ; $post++) 
    {

        if($post < $nb_posts)
        {
            $value = $all_posts[$post];

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
        else
        {
            break;
        }
    }


    $actual_page = $page;
    $first_page = 1;
    $next_page = $actual_page+1;
    $prev_page = $actual_page-1;
    $last_page = ceil($nb_posts/5);
    
    echo '<div id="nav-pages">';
    if($actual_page > 1)
    {
        echo '<a id="prev_page" href="index.php?page=old-posts&id='. $prev_page .'">PRÉC. - </a>';
        echo '<a id="first_page" href="index.php?page=old-posts&id='. $first_page .'">'. $first_page .'</a>';
    }
    if($actual_page > 3)
    {
          echo '<a>...</a>';
    }
    if($actual_page > 2)
    {
        echo '<a id="prev_page" href="index.php?page=old-posts&id='. $prev_page .'">'. $prev_page .'</a>';
    }
    echo '<a id="actual-page" href="index.php"><span>'. $actual_page .'</span></a>';
    if($actual_page < $last_page)
    {
        echo '<a id="next_page" href="index.php?page=old-posts&id='. $next_page .'">'. $next_page .'</a>';
        if($actual_page < $last_page-1)
        {
            echo '<a>...</a>';
            echo '<a id="last_page" href="index.php?page=old-posts&id='. $last_page .'">'. $last_page .'</a>';
        }
        echo '<a id="next_page" href="index.php?page=old-posts&id='. $next_page .'"> - SUIV.</a>';
    }
    echo '</div>';
    
    
?>



</section>




