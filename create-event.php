<?php 

    ini_set('display_errors', 1);
    echo $_COOKIE["userId"];
    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
    $_POST = array_merge($_POST, array("userid"=>$_COOKIE["userId"]));
    echo $_POST["userid"];
    pg_insert($resource, 'events', $_POST );
    // header("Location: ../index.php");    
?>