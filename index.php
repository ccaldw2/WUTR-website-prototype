<?php
    require_once 'Articles.php';

    $articles = new Articles();

    $test = $articles -> getArticle('00001');
    echo "<img src=$test->image_link>";
    echo "<h1>$test->title</h1>";
    echo "<p>$test->hypertext</p>";
