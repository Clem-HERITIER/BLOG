<?php

    function search_all_posts($bdd)
    {
        $reponse = $bdd->prepare(
        'select p.title, p.content, p.created_date, p.image, p.id, a.firstname, a.lastname, c.name FROM posts as p
        inner join authors as a on p.id_auth = a.id
        inner join categories as c on p.id_cat = c.id
        ORDER BY p.id DESC'
        );
        $reponse->execute();
        while ($post = $reponse->fetch()) 
        {
            $list_post[] = $post;
        }
        $reponse->closeCursor();
        return $list_post;
    }

    function search_all_authors($bdd)
    {
        $reponse = $bdd->prepare('select A.id, A.firstname, A.lastname, A.email, A.image, A.citation, A.description FROM authors as A');
        $reponse->execute();
        while ($authors = $reponse->fetch()) 
        {
            $list_authors[] = $authors;
        }
        $reponse->closeCursor();
        return $list_authors;
    }

    function search_all_categories($bdd)
    {
        $reponse = $bdd->prepare('select p.id, p.name, p.description FROM categories as p');
        $reponse->execute();
        while ($categories = $reponse->fetch()) 
        {
            $list_categories[] = $categories;
        }
        $reponse->closeCursor();
        return $list_categories;
    }

    function search_single_post($bdd, $id)
    {
        $reponse = $bdd->prepare(
            'select p.title, p.content, p.created_date, p.image, p.id, a.firstname, a.lastname, c.name FROM posts as p
            inner join authors as a on p.id_auth = a.id
            inner join categories as c on p.id_cat = c.id
            WHERE p.id = ?');
        $reponse->execute(array($id));
        $single_post = $reponse->fetch();
        $reponse->closeCursor();
        return $single_post;
    }

    function search_user($bdd, $login, $password)
    {
        $reponse = $bdd->prepare(
            'select A.firstname, A.lastname, A.email, A.id, A.level from authors as A 
            where A.email = ?
            and A.password = ?');
        $reponse->execute(array($login,MD5($password)));
        $user = $reponse->fetch();
        return $user;        
    }

    function old_posts_page($id)
    {
        $page = $id;
        return $page;
    }

    function sql_create($bdd, $title, $author, $categorie, $content, $file)
    {   
        $file_encoded = file_encode($file);
        $target_dir = 'img/article-bg/'.basename($file_encoded);
        move_uploaded_file($file['tmp_name'], $target_dir);
        $reponse = $bdd->prepare('INSERT INTO posts (title, id_auth, id_cat, content, image, created_date) VALUE (? ,? ,? ,?, ?, ?)');
        $reponse->execute(array(utf8_decode($title), $author, $categorie, utf8_decode($content), $file_encoded, date("Y-m-d H:i:s")));
    }

    function sql_update($bdd, $title, $author, $categorie, $content, $file, $old_img, $article_id)
    {   
        if(strlen($file['name']) !== 0)
        {
            unlink('img/article-bg/'.$old_img);
        }
        $file_encoded = file_encode($file);
        $target_dir = 'img/article-bg/'.basename($file_encoded);
        move_uploaded_file ( $file['tmp_name'], $target_dir);
        $reponse = $bdd->prepare('UPDATE posts SET title = ? , id_auth = ? , id_cat = ? , content = ? , image = ?, updated_date = ? WHERE id = ? ');
        $reponse->execute(array(utf8_decode($title), $author, $categorie, utf8_decode($content), $file_encoded, date("Y-m-d H:i:s"), $article_id));
    }

    function sql_delete($bdd, $id)
    {
        $reponse = $bdd->prepare('DELETE FROM posts WHERE id = ?');
        $reponse->execute(array($id));
    }

    function file_encode($file)
    {
        $split = explode('.', $file['name']);
        $file_name = reset($split);
        $extension = end($split);        
        $file_complete = $file_name.'_'. date('d-m-Y') .'.'.$extension;
        return $file_complete;
    }
?>