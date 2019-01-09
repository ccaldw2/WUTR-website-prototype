<?php
    class Article
        {
            public $title;
            public $image_link;
            public $hypertext;

            public function __construct($title, $image_link, $hypertext) {
                $this->title = $title;
                $this->image_link = $image_link;
                $this->hypertext = $hypertext;
            }
    }