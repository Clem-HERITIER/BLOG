<section id="auteurs-container">

    <?php

        foreach ($all_authors as $value) 
        {
            echo '<div class="card-container">';
            echo '<div class="card">';
            echo '<div class="auteurs-img" style="background: url(img/authors/'. $value['image'] .'); background-position: center; background-size: cover"><img class="approved" src="img/approved" alt=""></div>';
            echo '<h2 class="auteurs-name">'. utf8_encode($value['firstname']) .' '. utf8_encode($value['lastname']) .'</h2>';
            echo '<p class="card-cita">"'. utf8_encode($value['citation']) .'"</p>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p class="card-text">'. utf8_encode($value['description']) .'</p>';
            echo '<a href="#" class="btn">Contacter '. utf8_encode($value['firstname']) .'</a>';
            echo '</div>';
            echo '</div>';
        }

    ?>

</section>