<section id="user-profil-container">

<?php
        echo '<div id="inner-content">
                <form method="post" action="index.php?action=update-categorie&id='.  $categorie['id'] .'" enctype="multipart/form-data">
                    <input name="old-cat-img" type="hidden" value="'.  $categorie['image'] .'">
                    <input type="hidden" name="id" value="'. $categorie['id'] .'>
                <div id="user-img"> 
                    <div id="user-img">              
                        <div id="profil-img" style="background: url(img/categories/'.  $categorie['image'] .'); background-position: center; background-size: cover"></div>
                    </div>
                    <div id="user-info">
                        <hr class="info-hr">
                        <div class="info">
                        <label for="name">Catégorie</label>
                            <input type="text" name="name" value="'. utf8_encode($categorie['name']) .'" id="firstname">
                        </div>';
                        echo '<hr class="picture-hr">
                        <div class="info">
                        <label for="file-to-upload">Photo</label>
                        <input type="file" name="fileToUpload" id="file-to-upload">
                        </div>
                    </div>
                    <hr class="description-hr">
                    <textarea name="description" id="user-description">'. utf8_encode( $categorie['description']) .'</textarea>
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




