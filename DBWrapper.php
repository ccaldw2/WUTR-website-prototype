<?php
    require_once './vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    class DBWrapper
    {
        protected $database;
        protected $dbname = 'Articles';


        public function __construct() {
            $acc = ServiceAccount::fromJsonFile(__DIR__ . '/secret/wutr-site-prototype-d5f52a03bc5f.json');
            $firebase = (new Factory)->withServiceAccount($acc)->create();

            $this->database = $firebase->getDatabase();
        }

        public function fetch($article = null) {
            if (empty($article) || !isset($article)) {
                return null;
            }

            if ($this->database->getReference($this->dbname)->getSnapshot()->hasChild($article)) {
                $parent = $this->database->getReference($this->dbname)->getChild($article);
                return $parent->getValue();
            } else {
                return null;
            }
        }

        public function fetch_list() {
            if (($this->database)->getReference($this->dbname)->getSnapshot()->hasChildren()) {
                $article_ids = $this->database->getReference($this->dbname)->getSnapshot()->getValue();
                return $article_ids;
            } else {
                return null;
            }
        }

        public function fetch_list_selected($start, $len) {
            $shallow_list = $this->fetch_shallow_list();
            $keys = array_keys($shallow_list);
            return $this->database
                ->getReference($this->dbname)
                ->orderByKey()
                ->startAt($keys[$start])
                ->limitToFirst($len)
                ->getValue();
        }

        public function fetch_shallow_list() {
            $shallow_ids = $this-> database -> getReference($this->dbname) ->shallow() ->getSnapshot()->getValue();
            ksort($shallow_ids);
            return $shallow_ids;
        }

    }