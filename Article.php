<?php
    class Article
        {
            public $title;
            public $subtitle;
            public $image_link;
            public $hypertext;

            public function __construct($title, $subtitle, $image_link, $hypertext) {
                $this->title = $title;
                $this->subtitle = $subtitle;
                $this->image_link = $image_link;
                $this->hypertext = $hypertext;
            }
    }