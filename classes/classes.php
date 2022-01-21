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
            //cria o user no banco de dados
            //Linkar o user com o userId
        }
    }

?>