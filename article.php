<?php
    require_once 'DBWrapper.php';

    $db = new DBWrapper();
    $article_id = $_GET["id"];
    $article = $db->fetch($article_id);

    echo "<img height=300, src=$article[ImageLink]>";
    echo "<h1>$article[Title]</h1>";
    echo "<h4>$article[Subtitle]</h4>";
    echo "<p>$article[Hypertext]</p>";
    echo "<a href='../articles.php/?page=1'>Back to articles</a>";
