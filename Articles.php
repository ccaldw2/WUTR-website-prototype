<?php
    require_once 'Article.php';
    require_once './vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    class Articles {
        protected $database;
        protected $dbname = 'Articles';


        public function __construct() {
            $acc = ServiceAccount::fromJsonFile(__DIR__ . '/secret/wutr-site-prototype-d5f52a03bc5f.json');
            $firebase = (new Factory) -> withServiceAccount($acc) -> create();

            $this->database = $firebase->getDatabase();
        }

        public function getArticle($article = null) {
            if (empty($article) || !isset($article)){
                return null;
            }

            if ($this -> database -> getReference($this -> dbname) -> getSnapshot() -> hasChild($article)){
                $parent = $this -> database -> getReference($this -> dbname) -> getChild($article);
                return $this->generate_article_object($parent);
            }

            else {
                return null;
            }
        }

        public function get_articles_list(){

        }

        private function generate_article_object($parent){
            $title = $parent -> getChild('Title') -> getValue();
            $subtitle = $parent -> getChild('Subtitle') -> getValue();
            $image_link = $parent -> getChild('ImageLink') -> getValue();
            $hypertext = $parent ->getChild('Hypertext') -> getValue();

            $article = new Article($title, $subtitle, $image_link, $hypertext);
            return $article;
        }
    }