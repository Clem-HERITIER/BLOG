<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
 
    $bdd = new PDO('mysql:host=localhost;dbname=fighthub', 'root');

    $all_posts = search_all_posts($bdd);

    $all_posts_utf8 = utf8_converter($all_posts);

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

    function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                    $item = utf8_encode($item);
            }
        });
    
        return $array;
    }

    $nb_posts = count($all_posts_utf8);

    for($i = 0; $i <= $nb_posts; $i++)
    {
            unset($all_posts_utf8[$i][0]);
            unset($all_posts_utf8[$i][1]);
            unset($all_posts_utf8[$i][2]);
            unset($all_posts_utf8[$i][3]);
            unset($all_posts_utf8[$i][4]);
            unset($all_posts_utf8[$i][5]);
            unset($all_posts_utf8[$i][6]);
            unset($all_posts_utf8[$i][7]);
            unset($all_posts_utf8[$i][8]);
            unset($all_posts_utf8[$i][9]);
            unset($all_posts_utf8[$i][10]);
    }

    // var_dump($all_posts);

    // var_dump($all_posts_utf8);

    echo json_encode($all_posts_utf8);

?>