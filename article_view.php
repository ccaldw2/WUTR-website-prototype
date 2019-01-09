<?php
    require_once 'Articles.php';

    $articles = new Articles();
    $article_id = $_GET["id"];
    $test = $articles -> fetch_article($article_id);

    echo "<img height=300, src=$test[ImageLink]>";
    echo "<h1>$test[Title]</h1>";
    echo "<h4>$test[Subtitle]</h4>";
    echo "<p>$test[Hypertext]</p>";

