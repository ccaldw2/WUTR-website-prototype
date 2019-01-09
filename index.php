<?php
    require_once 'Articles.php';
    $db = new Articles();

    $articles = $db -> fetch_articles_list()->getValue();
    $article_id = '00001';

    echo "<h1>All Articles</h1>";
    foreach($articles as $id => $article) {;
        echo "<a href='article_view.php/?id=$id'>$article[Title]</a><br/><hr/>";
    }