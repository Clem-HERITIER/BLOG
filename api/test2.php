<?php

    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=fighthub', 'root');
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    };

    function search_all_posts($bdd)
    {
    $reponse = $bdd->prepare('SELECT p.id as id, p.title as title, p.content as content,p.id_cat as id_cat, p.id_auth as id_author, p.created_date as created_date , p.updated_date as updated_date, p.image as image, a.firstname as firstname, a.lastname as lastname, c.name as name from posts as p 
    inner join authors as a on p.id_auth = a.id 
    inner join categories as c on p.id_cat = c.id   
    order by p.id DESC');
    $reponse->execute();
    $list_post = array();
    $one_post = array();
    while ($post = $reponse->fetch()) {
        $one_post = ['id' => $post['id'], 'title' => utf8_encode($post['title']), 'content' => utf8_encode($post['content']), 'id_cat' => $post['id_cat'],'id_author' => $post['id_author'],'created_date' => $post['created_date'],'updated_date' => $post['updated_date'],'image' => $post['image'],'firstname' => utf8_encode($post['firstname']),'lastname' => utf8_encode($post['lastname']),'name' => utf8_encode($post['name'])];
            $list_post[] = $one_post;
    }
    $reponse->closeCursor();
    return $list_post;
    }
    
    echo json_encode(search_all_posts($bdd));

?>