<section id="user-profil-container">

<?php

    foreach( $all_authors as $value)
    {
        if($value['id'] === $_SESSION['id'])
        {
            echo '<div id="inner-content">
                    <form method="post" action="index.php?action=update-user&id='. $value['id'] .'" enctype="multipart/form-data">
                        <input name="old-author-img" type="hidden" value="'. $value['image'] .'">
                        <input type="hidden" name="id" value="'. $value['id'] .'>
                    <div id="user-img"> 
                        <div id="user-img">              
                            <div id="profil-img" style="background: url(img/authors/'. $value['image'] .'); background-position: center; background-size: cover"></div>
                        </div>
                        <div id="user-info">
                            <hr class="info-hr">
                            <div class="info">
                            <label for="firstname">Prénom</label>
                                <input type="text" name="firstname" value="'. $value['firstname'] .'" id="firstname">
                            </div>
                            <div class="info">
                            <label for="firstname">Nom</label>
                            <input type="text" name="lastname" value="'. $value['lastname'] .'" id="lastname">
                            </div>
                            <div class="info">
                            <label for="firstname">Citation</label>
                            <textarea name="citation" id="citation" cols="32" rows="3">'. utf8_encode($value['citation']) .'</textarea>
                            </div>
                            <hr class="picture-hr">
                            <div class="info">
                            <label for="file-to-upload">Photo</label>
                            <input type="file" name="fileToUpload" id="file-to-upload">
                            </div>
                        </div>
                        <hr class="description-hr">
                        <textarea name="description" id="user-description">'. utf8_encode($value['description']) .'</textarea>
                        <div class="pass-request">
                            <label for="password" >Rentrez votre mot de passe pour valider</label>
                            <input type="text" name="password">
                        </div>
                        <input class="update-user" type="submit" value="Update !">
                        
                    </form>
                </div>';
        }

    }


?>

      




