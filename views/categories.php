<section id="categories-container">


    <?php

        foreach ($categories as $value) 
            {
                echo '<a href="index.php?page=posts-by-categories&id='. $value['id'] .'" class="categories" style="background: url(img/categories/'. $value['image'] .'); background-position: center; background-size: cover">';
                echo '<div id="cat-footer">';
                echo '<h2 class="cat-name">'. utf8_encode($value['name']) .'</h2>';
                echo '<p class="cat-description">"'. utf8_encode($value['description']) .'"</p>';
                echo '</div>';
                echo '</a>';
            }

    ?>


</section>