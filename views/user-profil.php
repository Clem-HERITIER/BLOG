<section id="user-profil-container">

<?php

    
        echo '<div id="inner-content">
                <form method="post" action="index.php?action=update-author&id='. $author['id'] .'" enctype="multipart/form-data">
                    <input id="zobi" name="old-author-img" type="hidden"  value="'. $author['image'] .'">
                    <input id="zobi" name="id" type="hidden" value="'. $author['id'] .'>
                <div id="user-img"> 
                    <div id="user-img">              
                        <div id="profil-img" style="background: url(img/authors/'. $author['image'] .'); background-position: center; background-size: cover"></div>
                    </div>
                    <div id="user-info">
                        <hr class="info-hr">
                        <div class="info">
                        <label for="firstname">Prénom</label>
                            <input type="text" name="firstname" value="'. utf8_encode($author['firstname']) .'" id="firstname">
                        </div>
                        <div class="info">
                        <label for="firstname">Nom</label>
                        <input type="text" name="lastname" value="'. utf8_encode($author['lastname']) .'" id="lastname">
                        </div>
                        <div class="info">
                        <label for="firstname">Citation</label>
                        <textarea name="citation" id="citation" cols="32" rows="3">'. utf8_encode($author['citation']) .'</textarea>
                        </div>';
                        if($_SESSION['level'] == 1)
                        {
                            echo '<div class="info">
                                  <label for="level">Level</label>
                                  <select name="level">';
                            if( $author['level'] == 1)
                            {
                                echo'<option value="1">1</option>
                                     <option value="2">2</option>
                                     </select>
                                     </div>';
                            }  
                            else 
                            {
                                echo'<option value="2">2</option>
                                     <option value="1">1</option>
                                     </select>
                                     </div>';
                            }  
                        }
                        else
                        {
                            echo ' <input name="level" type="hidden" value="'. $author['level'] .'>';
                        }
                        echo '<hr class="picture-hr">
                        <div class="info">
                        <label for="file-to-upload">Photo</label>
                        <input type="file" name="fileToUpload" id="file-to-upload">
                        </div>
                    </div>
                    <hr class="description-hr">
                    <textarea name="description" id="user-description">'. utf8_encode($author['description']) .'</textarea>
                    <input class="update-user" type="submit" value="Update !">
                    
                </form>
            </div>';


?>
<!-- 
<div class="pass-request">
    <label for="password" >Rentrez votre mot de passe pour valider</label>
    <input type="text" name="password">
</div> 
-->




