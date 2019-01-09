<?php
    require_once 'Articles.php';

    $articles = new Articles();
    $article_id = $_GET["id"];
    $test = $articles -> getArticle($article_id);
    echo "<img height=300, src=$test->image_link>";
    echo "<h1>$test->title</h1>";
    echo "<h4>$test->subtitle</h4>";
    echo "<p>$test->hypertext</p>";

?>

