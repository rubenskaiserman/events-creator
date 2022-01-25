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
            $test = pg_connect("host=localhost port=5432 dbname=kaiserman user=kaiserman password=chakalaka") or die("could not connect");
            echo $test;  
        }
    }

?>