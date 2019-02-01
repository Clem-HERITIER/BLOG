<section id="update-container">



    <?php

        if (!isset($_SESSION['id']))
        {
            echo '<div id="content">';
            echo 'Veuillez vous connecter afin de modifier un article.';
            echo '</div>';
        }
        else
        {
            echo '<div id="content">';
            echo '<h2> Editer l\'article</h2>';
            echo '<form method="post" action="index.php?action=update&id='. $post['id'] .'" enctype="multipart/form-data">';
            // ID ARTICLE
            echo '<input name="article-id" type="hidden" value="'. $post['id'] .'">';
            echo '<input name="old-article-img" type="hidden" value="'. $post['image'] .'">';
            // TITRE
            echo '<label for="title">Titre</label>';
            echo '<input type="text" name="title" value="'. utf8_encode($post['title']) .'">';
            // LISTE AUTEURS
            echo '<select id="authors-select"  name="author">';
            echo '<option value="null">--Auteurs--</option>';
                    foreach ($all_authors as $value) 
                    {
                        echo '<option value="'. $value['id'] .'">'. utf8_encode($value['firstname']) .' '. utf8_encode($value['lastname']) .'</option>';
                    }
            echo '</select>';
            // LISTE CATEGORIES
            echo '<select id="categories-select" name="categorie">';
            echo '<option value="null" name="categorie">--Categories--</option>';
                    foreach ($all_categories as $value) 
                    {
                        echo '<option value="'. $value['id'] .'">'. utf8_encode($value['name']) .'</option>';
                    }
            echo '</select>';
            // CONTENT
            echo '<label for="content">Content</label>';
            echo '<textarea name="content" rows="20" cols="10"> '. utf8_decode($post['content']) .'</textarea>';
            // UPLOAD IMAGE
            if(isset($post['image']))
            {
                echo '<div id="actual-img">';
                echo '<p>image actuelle : </p><a href="img/article-bg/'. $post['image'] .'" target="_blank">'. $post['image'] .'</a></p>';
                echo '</div>';
            }
            echo '<input type="file" name="fileToUpload" id="file-to-upload">';
            // POST
            echo '<input id="update" type="submit" value="Update !">';
            echo '</form>';
            echo '</div>';
        }

    ?>

</section>