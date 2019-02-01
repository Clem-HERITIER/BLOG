<section id="user-profil-container">


        <div id="inner-content">
            <form method="post" action="index.php?action=update-user&id='.  .'" enctype="multipart/form-data">
            <div id="user-img">
                <div id="profil-img" style="background: url(img/authors/'. $value['image'] .'); background-position: center; background-size: cover"></div>
                <input type="file" name="fileToUpload" id="file-to-upload">
            </div>
            <div id="user-info">
                <div class="info">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" value=" " id="firstname">
                </div>
                <div class="info">
                <label for="firstname">Nom</label>
                <input type="text" name="lastname" value=" " id="lastname">
                </div>
                <div class="info">
                <label for="firstname">Citation</label>
                <input type="text" name="citation" value=" " id="citation">
                </div>
            </div>
            <hr id="separator">
            <textarea name="description" value="" id="user-description" ></textarea>
            <div>
                <input id="update-user" type="submit" value="Update !">
                </form>
            </div>
        </div>
    





