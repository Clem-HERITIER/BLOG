<section id="details-container">

    <?php
        
            echo '<div id="full-page">';
            echo '<div id="header-img" style="background: url(img/article-bg/'. $post['image'] .'); background-position: center; background-size: cover" alt=""></div>';
            echo '<h3>'. date("d-m-Y", strtotime($post['created_date'])) .' / '.  utf8_encode($post['firstname']) .' / '. utf8_encode($post['name']) .'</h3>';
            echo '<h2>'. utf8_encode($post['title']) .'</h2>';
            echo '<hr/>';
            echo '<div id="article-content">'. utf8_encode($post['content']) .'</div>';
            echo '</div>';

    ?>

</section>