<?php 
    ini_set("display_errors", 1);
    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
    pg_send_query($resource, "SELECT * FROM users WHERE email = '{$_POST["email"]}'");
    $query = pg_get_result($resource);
    if(pg_fetch_result($query, 0, "email") != null){
        header("Location: index.html?error=1");
    }
    else{
        pg_insert($resource, 'users', $_POST);
        pg_send_query($resource, "SELECT * FROM users WHERE email = '{$_POST["email"]}'");
        $query = pg_get_result($resource);
        $userId = pg_fetch_result($query, 0, "userId");
        setcookie("userId", $userId, time() + 60 * 60, $domain="/");
        header("Location: ../index.php");
    }
?>