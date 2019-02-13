<section id="newpost-container">

    <?php
        if (!isset($_SESSION['id']))
        {
            echo '<div id="content">';
            echo 'Veuillez vous connecter afin de créer un article.';
            echo '</div>';
        }
        else
        {         
            echo '<div id="content">';
            echo '<p>'. $message .'</p>';
            echo '<h2> Créer un nouvel article</h2>';
            echo '<form method="post" action="index.php?action=create" enctype="multipart/form-data">';
            // TITRE
            echo '<label for="title">Titre</label>';
            echo '<input type="text" name="title">';
            // LISTE AUTEURS
            echo '<select id="authors-select"  name="author">';
                    if($_SESSION['level'] == 1)
                    {
                        echo '<option value="null">--Auteurs--</option>';

                        foreach ($all_authors as $value) 
                        {
                            echo '<option value="'. $value['id'] .'">'. utf8_encode($value['firstname']) .' '. utf8_encode($value['lastname']) .'</option>';
                        }
                    }
                    else
                    {
                        echo '<option value="'. $_SESSION['id'] .'">'. $_SESSION['firstname'] .' '. $_SESSION['lastname'] .'</option>';
                    }
            echo '</select>';
            // LISTE CATEGORIES
            echo '<select id="categories-select" name="categorie">';
            echo '<option value="null" name="categorie">--Catégories--</option>';
                    foreach ($all_categories as $value) 
                    {
                        echo '<option value="'. $value['id'] .'">'. utf8_encode($value['name']) .'</option>';
                    }
            echo '</select>';
            // CONTENT
            echo '<label for="content">Content</label>';
            echo '<textarea name="content" rows="20" cols="10"></textarea>';
            // UPLOAD IMAGE
            echo '<input type="file" name="fileToUpload" id="file-to-upload">';
            // POST
            echo '<input id="create" type="submit" value="Create !">';
            echo '</form>';
            echo '</div>';
        }

    ?>

</section>