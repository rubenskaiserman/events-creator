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

        public function createUser($resource){
            $array = array("name"=>$this->name, "email"=>$this->email, "password"=>$this->password);
            pg_insert($resource, 'users', $array);
            pg_send_query($resource, "SELECT userId FROM users WHERE email = '{$this->email}'");
            $query = pg_get_result($resource);
            $this->userId = pg_fetch_result($query, 0, "userId"); 
        }
    }

?>