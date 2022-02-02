<?php 
    ini_set('display_errors', 1);
    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
    pg_query($resource, "DELETE FROM events WHERE eventid={$_POST['event']}");
    header("Location: index.php");    
?>