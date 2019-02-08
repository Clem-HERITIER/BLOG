<?php

    function search_all_posts($bdd)
    {
        $reponse = $bdd->prepare(
        'select p.title, p.content, p.created_date, p.updated_date, p.image, p.id, p.id_auth, p.id_cat, a.firstname, a.lastname, c.name FROM posts as p
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

    function search_all_comments($bdd, $id)
    {
        $reponse = $bdd->prepare('select A.id, A.author, A.mail, A.content, A.created_date FROM comments as A 
        WHERE id_post = ?
        ORDER by id DESC');
        $reponse->execute(array($id));
        // if($reponse->fetch())
        // {
            while ($comments = $reponse->fetch())
            {
                $list_comments[] = $comments;
            }
            $reponse->closeCursor();
            return $list_comments;
        // }
        // else
        // {
        //     return null;
        // }
    }
    
    function count_comments($bdd, $id)
    {
        $reponse = $bdd->prepare('SELECT count(*) from comments WHERE id_post = ?');
        $reponse->execute(array($id));
        $nb_comments = $reponse->fetch();
        return $nb_comments;
    }

    function search_all_authors($bdd)
    {
        $reponse = $bdd->prepare('select A.id, A.firstname, A.lastname, A.email, A.image, A.citation, A.description, A.level FROM authors as A');
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
        $reponse = $bdd->prepare('select A.id, A.name, A.description, A.image FROM categories as A');
        $reponse->execute();
        while ($categories = $reponse->fetch()) 
        {
            $list_categories[] = $categories;
        }
        $reponse->closeCursor();
        return $list_categories;
    }

    function search_posts_by_categories($bdd, $id)
    {
        $reponse = $bdd->prepare(
            'select p.title, p.content, p.created_date, p.image, p.id, a.firstname, a.lastname, c.name, p.id_auth, p.id_cat FROM posts as p
            inner join authors as a on p.id_auth = a.id
            inner join categories as c on p.id_cat = c.id
            WHERE id_cat = ?'
            );
            $reponse->execute(array($id));
            while ($post = $reponse->fetch()) 
            {
                $list_post[] = $post;
            }
            $reponse->closeCursor();
            return $list_post;
    }

    function search_categorie($bdd, $id)
    {
        $reponse = $bdd->prepare(
        'select A.id, A.name, A.description, A.image FROM categories as A
        WHERE id = ?');
        $reponse->execute(array($id));
        $single_categorie = $reponse->fetch();
        $reponse->closeCursor();
        return $single_categorie;
    }

    function search_single_post($bdd, $id)
    {
        $reponse = $bdd->prepare(
            'select p.title, p.content, p.created_date, p.image, p.id, a.firstname, a.lastname, c.name, p.id_auth, p.id_cat FROM posts as p
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
    
    function search_author($bdd, $id)
    {
        $reponse = $bdd->prepare('select A.id, A.firstname, A.lastname, A.email, A.image, A.citation, A.description, A.level FROM authors as A
        WHERE id = ?');
        $reponse->execute(array($id));
        $author = $reponse->fetch();
        return $author;
    }

    function sql_create_post($bdd, $title, $author, $categorie, $content, $file)
    {   
        $file_encoded = file_encode($file);
        $target_dir = 'img/article-bg/'.basename($file_encoded);
        move_uploaded_file($file['tmp_name'], $target_dir);
        $reponse = $bdd->prepare('INSERT INTO posts (title, id_auth, id_cat, content, image, created_date) VALUE (? ,? ,? ,?, ?, ?)');
        $reponse->execute(array(utf8_decode($title), $author, $categorie, utf8_decode($content), $file_encoded, date("Y-m-d H:i:s")));
    }

    function sql_update_post($bdd, $title, $author, $categorie, $content, $file, $old_img, $article_id)
    {   
        if(strlen($file['name']) !== 0)
        {
            // unlink('img/article-bg/'.$old_img);
            $file_encoded = file_encode($file);
            $target_dir = 'img/article-bg/'.basename($file_encoded);
            move_uploaded_file ( $file['tmp_name'], $target_dir);
        }
        else
        {
            $file_encoded = $old_img;
        }
        $reponse = $bdd->prepare('UPDATE posts SET title = ? , id_auth = ? , id_cat = ? , content = ? , image = ?, updated_date = ? WHERE id = ? ');
        $reponse->execute(array(utf8_decode($title), $author, $categorie, utf8_decode($content), $file_encoded, date("Y-m-d H:i:s"), $article_id));
    }

    function sql_delete_post($bdd, $id)
    {
        $reponse = $bdd->prepare('DELETE FROM posts WHERE id = ?');
        $reponse->execute(array($id));
    }

    function sql_create_cat($bdd, $name, $description, $file)
    {
        $file_encoded = file_encode($file);
        $target_dir = 'img/categories/'.basename($file_encoded);
        move_uploaded_file($file['tmp_name'], $target_dir);
        $reponse = $bdd->prepare('INSERT INTO categories (name, description, image) VALUE (? ,? ,?)');
        $reponse->execute(array(utf8_decode($name), utf8_decode($description), $file_encoded));
    }

    function sql_update_categorie($bdd, $cat_id, $cat_name, $description, $old_img, $file)
    {
        if(strlen($file['name']) !== 0)
        {
            unlink('img/categories/'.$old_img);
            $file_encoded = file_encode($file);
            $target_dir = 'img/categories/'.basename($file_encoded);
            move_uploaded_file ( $file['tmp_name'], $target_dir);
        }
        else
        {
            $file_encoded = $old_img;
        }
        $reponse = $bdd->prepare('UPDATE categories SET name = ?, description = ?, image = ? WHERE id = ?');
        $reponse->execute(array(utf8_decode($cat_name), utf8_decode($description), $file_encoded, $cat_id));
    }
    
    function sql_delete_categorie($bdd, $id)
    {
        $reponse = $bdd->prepare('DELETE FROM categories WHERE id = ?');
        $reponse->execute(array($id));
    }

    function sql_create_auth($bdd, $lastname, $firstname, $mail, $level, $file)
    {
        $file_encoded = file_encode($file);
        $target_dir = 'img/authors/'.basename($file_encoded);
        move_uploaded_file($file['tmp_name'], $target_dir);
        $reponse = $bdd->prepare('INSERT INTO authors (firstname, lastname, email, password, image, level) VALUE (? ,? ,?, MD5(password), ?, ?)');
        $reponse->execute(array(utf8_decode($firstname), utf8_decode($lastname), utf8_decode($mail), $file_encoded, $level));
    }

    function sql_update_author($bdd, $author_id, $firstname, $lastname, $citation, $description, $level, $old_author_img, $file)
    {
        if(strlen($file['name']) !== 0)
        {
            unlink('img/authors/'.$old_author_img);
            $file_encoded = file_encode($file);
            $target_dir = 'img/authors/'.basename($file_encoded);
            move_uploaded_file ( $file['tmp_name'], $target_dir);
        }
        else
        {
            $file_encoded = $old_author_img;
        }
        $reponse = $bdd->prepare('UPDATE authors SET firstname = ?, lastname = ?, citation = ?, description = ?, image = ?, level = ? WHERE id = ?');
        $reponse->execute(array(utf8_decode($firstname), utf8_decode($lastname), utf8_decode($citation), utf8_decode($description), $file_encoded, $level, $author_id));
    }

    function sql_delete_author($bdd, $id)
    {
        $reponse = $bdd->prepare('DELETE FROM authors WHERE id = ?');
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

    function sql_add_comment($bdd, $post_id, $name, $mail, $comment)
    {
        $reponse = $bdd->prepare('INSERT INTO comments (id_post, author, mail, content, created_date) VALUE ( ?,?,?,?,? )');
        $reponse->execute(array($post_id, utf8_decode($name), utf8_decode($mail), utf8_decode($comment), date("Y-m-d H:i:s")));
    }
?>