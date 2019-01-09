<?php
    require_once './vendor/autoload.php';
    require_once 'Articles.php';

    $articles = new Articles();

    $test1 = $articles -> getArticle('Test 1');
    $img = $articles->getArticle("Test 1");
    echo "<img src=$img>";
