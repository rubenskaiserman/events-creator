<?php 
    setcookie("userId", -1, time() -1, $domain="/");
    header("Location: ../index.php")
?>