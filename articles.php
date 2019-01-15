<?php
    require_once 'DBWrapper.php';
    $db = new DBWrapper();

    $articles_per_page = $_GET['articles_per_page'];
    $page = $_GET['page'];

    $start = ($page-1) * $articles_per_page;
    $articles = $db -> fetch_list_selected($start, $articles_per_page);
    $len = sizeof($db->fetch_shallow_list());

    echo"<h1>All Articles</h1>";
    foreach($articles as $id => $article) {
        echo "<img width='80vw' height='60vw' src='$article[ImageLink]'/> <a href='../article.php/?id=$id'>$article[Title]</a><br/><hr/>";
    }

    $last = ceil($len / $articles_per_page);
    $prev = ($page - 1 > 0) ? $page - 1 : 1;
    $next = ($page + 1 < $last) ? $page + 1 : $last;
    echo "<a href=?page=1>first</a> | <a href=?page=$prev>prev</a> | <a href=?page=$next>next</a> | <a href=?page=$last>last</a>";
    echo "<br/><a href='../'>home</a>";
