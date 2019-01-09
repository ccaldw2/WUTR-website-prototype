<?php

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
                return false;
            }

            if ($this -> database -> getReference($this -> dbname) -> getSnapshot() -> hasChild($article)){
                return $this -> database -> getReference($this -> dbname) -> getChild($article) -> getValue();
            }

            else {
                return false;
            }
        }
    }