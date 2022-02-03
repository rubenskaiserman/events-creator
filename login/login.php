<?php 
    ini_set("display_errors", 1);
    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
    pg_send_query($resource, "SELECT * FROM users WHERE email = '{$_POST["email"]}'");
    $query = pg_get_result($resource);
    $password = pg_fetch_result($query, 0, "password");
    if($password == $_POST["password"]){
        $userId = pg_fetch_result($query, 0, "userId");
        setcookie("userId", $userId, time() + 60 * 60 * 3, $domain='/');
        echo $_COOKIE["userId"];
        header("Location: ../index.php");
    }
    else {
        header("Location: index.html?error=1");
    }

?>