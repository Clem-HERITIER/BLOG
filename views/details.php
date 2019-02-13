<section id="details-container">


    <div id="full-page">
    
    <?php
            echo '<div id="header-img" style="background: url(img/article-bg/'. $post['image'] .'); background-position: center; background-size: cover" alt=""></div>';
            echo '<h3>'. date("d-m-Y", strtotime($post['created_date'])) .' / <a href="index.php?page=posts-by-authors&id='. $post['id_auth'] .'">'.  utf8_encode($post['firstname']) .'</a> / <a href="index.php?page=categories-posts&id='. $post['id_cat'] .'">'. utf8_encode($post['name']) .'</a></h3>';
            echo '<h2>'. utf8_encode($post['title']) .'</h2>';
            echo '<hr/>';
            echo '<div id="article-content">'. utf8_encode($post['content']) .'</div>';
    ?>
        
            <hr>
        <div id="new-comment">
            <h3>T'as un truc a ajouter?</h3>
            <form method="post" <?php echo'action="index.php?action=add-comment&id='. $post['id'] .'"'?> >
                <input type="hidden" name="post-id" <?php echo 'value="'. $post['id'] .'"'; ?>">
                <div class="info">
                    <input type="text" name="name" placeholder="Nom" >
                    <input type="email" name="mail" placeholder="Email" >
                </div>
                <div class="comment">
                    <textarea name="comment" placeholder="Votre commentaire" ></textarea>
                </div>
                <div id="submit">
                    <input type="submit" value="valider">
                </div>
            </form>
            <div id="reponse"> <?php echo $reponse_create_comment ?> </div>
        </div>

        <?php 
            if(!isset($comments))
            {
               
            }
            else
            {
                echo'<div class="all-comments">';

                echo'<h3>Il sont '. $nb_comments['count(*)'] .' à avoir osé ouvrir leurs gueules !</h3>';

                    foreach ($comments as $value) 
                    {
                        echo '  <div>
                                    <div class="info">
                                        <h4>'. utf8_encode($value['author']) .'</h4><h5>'. utf8_encode($value['mail']) .'</h5><h5>posté le : '. $value['created_date'] .'</h5>
                                    </div>
                                    <div class="comment">'. utf8_encode($value['content']) .'</div>
                                </div>';
                    }
            }    
        ?>    
                    
        </div>
    </div>


</section>