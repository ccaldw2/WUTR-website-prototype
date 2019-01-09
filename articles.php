<?php
    require_once 'DBWrapper.php';
    $db = new DBWrapper();
    $page = $_GET['page'];
    $articles = $db -> fetch_list();
    $articles_per_page = 5;
    $len = 5;

    echo"<h1>All Articles</h1>";
    foreach($articles as $id => $article) {
        echo "<img width='80vw' height='60vw' src='$article[ImageLink]'/> <a href='../article.php/?id=$id'>$article[Title]</a><br/><hr/>";
    }

    $last = ceil($len / $articles_per_page);
    $prev = ($page - 1 > 0) ? $page - 1 : 1;
    $next = ($page + 1 < $last) ? $page + 1 : $last;
    echo "<a href=?page=1>first</a> | <a href=?page=$prev>prev</a> | <a href=?page=$next>next</a> | <a href=?page=$last>last</a>";