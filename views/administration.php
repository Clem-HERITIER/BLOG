<section id="admin-container">

    <div class="admin title">
        <h2>Administration</h2>
    </div>
    <div class="admin authors">
        <h2>Authors</h2>
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>PRÉNOM</th>
                    <th>MAIL</th>
                    <th>LEVEL</th> 
                    <th>IMAGE</th>
                    <th>EDIT/DELETE</th>
                </tr>
            </thead>
                <?php
                    echo '<tbody class="table-body">';
                    foreach ($all_authors as $value) 
                    {
                        echo '<tr class="table-row">
                                <th class="bordered lastname">'. utf8_encode($value['lastname']) .'</th>
                                <th class="bordered firstname">'. utf8_encode($value['firstname']) .'</th>
                                <th class="bordered">'. utf8_encode($value['email']) .'</th>
                                <th class="bordered">'. $value['level'] .'</th>
                                <th class="bordered img"><div class="img-authors" style="background: url(img/authors/'. $value['image'] .'); background-position: center; background-size: cover"></div></th>
                                <th class="bordered">
                                <div class="edit-delete edit-delete-'. $value['id'] .'">
                                <button class="ask-delete" data-id="'. $value['id'] .'"> DELETE </button>
                                <button class="edit">
                                <a href="index.php?page=edit-author&id='. $value['id'] .'"> EDIT </a></button>
                                </div>
                                <div class="confirm confirm-'. $value['id'] .' hidden">
                                <h3>Supprimer ?</h3>
                                <button class="delete"><a href="index.php?action=delete-author&id='. $value['id'] .'"> OUI </a></button>
                                <button class="no-delete" data-id="'. $value['id'] .'"> NON </button>
                                </th>
                             </tr>';
                    }
                    echo '</tbody>';
                ?>
            <tfoot>
                <tr>
                    <form method="post" action="index.php?action=create-auth" enctype="multipart/form-data">
                    <th><input type="text" name="lastname" placeholder="NOM" required></th>
                    <th><input type="text" name="firstname" placeholder="PRÉNOM" required></th>
                    <th><input type="email" name="mail" placeholder="MAIL" required></th>
                    <th><select name="level"><option value="2">2</option><option value="1">1</option></select></th>
                    <th><input type="file" name="image"></th>
                    <th><input type="submit" value="Ajouter"></th>
                    </form>
                </tr>
            </tfoot>     
        </table>
    </div>
    <div class="admin categories">
        <h2>Catégories</h2>
        <table>
            <thead>
                <tr>
                    <th>NOM</th>
                    <th>DESCRIPTION</th>
                    <th>IMAGE</th>
                    <th>EDIT/DELETE</th>
                </tr>
            </thead>
                <?php
                    echo '<tbody class="table-body">';
                    foreach ($categories as $value) 
                    {
                        echo '<tr class="table-row">
                                <th class="bordered">'. utf8_encode($value['name']) .'</th>
                                <th class="bordered">'. utf8_encode($value['description']).'</th>
                                <th class="bordered ing"><div class="img-cat" style="background: url(img/categories/'. $value['image'] .'); background-position: center; background-size: cover"></div></th>
                                <th class="bordered">
                                <div class="edit-delete edit-delete-'. $value['id'] .'">
                                <button class="ask-delete" data-id="'. $value['id'] .'"> DELETE </button>
                                <button class="edit">
                                <a href="index.php?page=edit-categorie&id='. $value['id'] .'"> EDIT </a></button>
                                </div>
                                <div class="confirm confirm-'. $value['id'] .' hidden">
                                <h3>Supprimer ?</h3>
                                <button class="delete"><a href="index.php?action=delete-categorie&id='. $value['id'] .'"> OUI </a></button>
                                <button class="no-delete" data-id="'. $value['id'] .'"> NON </button>
                                </th>
                             </tr>';
                    }
                    echo '</tbody>';
                ?>
            <tfoot>
                <tr>
                    <form method="post" action="index.php?action=create-cat" enctype="multipart/form-data">
                    <th><input type="text" name="name" placeholder="NOM" required></th>
                    <th><input type="text" name="description" placeholder="DESCRIPTION" required></th>
                    <th><input type="file" name="image"></th>
                    <th><input type="submit" value="Ajouter"></th>
                    </form>
                </tr>
            </tfoot>    
        </table>
    </div>
    <div class="admin posts">
        <h2>Posts</h2>
        <table>
            <thead>
                <tr>
                    <th>TITRE</th>
                    <th>CONTENT</th>
                    <th>AUTHOR</th>
                    <th>CATEGORIES</th>
                    <th>IMAGE</th>
                    <th>CREATED</th>
                    <th>UPDATED</th>
                    <th>EDIT/DELETE</th>
                </tr>
            </thead>
                <?php
                    echo '<tbody class="table-body">';
                    foreach ($all_posts as $value) 
                    {
                        echo '<tr class="table-row">
                                <th class="bordered">'. utf8_encode($value['title']) .'</th>
                                <th class="bordered content">"'. utf8_encode(substr($value['content'], 0, 50)) .'..."</th>
                                <th class="bordered firstname">'. utf8_encode($value['firstname']) .'</th>
                                <th class="bordered">'. utf8_encode($value['name']) .'</th>
                                <th class="bordered img"><div class="img-posts" style="background: url(img/article-bg/'. $value['image'] .'); background-position: center; background-size: cover"></div></th>
                                <th class="bordered date">'. $value['created_date'] .'</th>
                                <th class="bordered date">'. $value['updated_date'] .'</th>
                                <th class="bordered">
                                <div class="edit-delete edit-delete-'. $value['id'] .'">
                                <button class="ask-delete" data-id="'. $value['id'] .'"> DELETE </button>
                                <button class="edit">
                                <a href="index.php?page=update&id='. $value['id'] .'"> EDIT </a></button>
                                </div>
                                <div class="confirm confirm-'. $value['id'] .' hidden">
                                <h3>Supprimer ?</h3>
                                <button class="delete"><a href="index.php?action=delete&id='. $value['id'] .'"> OUI </a></button>
                                <button class="no-delete" data-id="'. $value['id'] .'"> NON </button>
                                </th>
                             </tr>';
                    }
                    echo '</tbody>';
                ?>
        </table>
    </div>

 
</section>