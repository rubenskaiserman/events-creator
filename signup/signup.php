<?php 
    include "../classes/classes.php";

    $user = new User($_POST["email"], $_POST["name"], $_POST["password"]);
    header("Location: ../index.php");
    exit();
    
?>