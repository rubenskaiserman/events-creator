<?php 

    class User{
        public $userId;
        public $name;
        public $email;
        public $password;

        public function __construct(String $email, String $name, String $password){
            $this->email = $email;
            $this->name = $name;
            $this->password = $password;
        }

        public function createUser(){
            $resourse = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
        }
    }

?>