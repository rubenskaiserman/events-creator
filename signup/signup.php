<?php 
    include "../classes/classes.php";

    $user = new User();
    $element = 'name';
    echo $user->$element;
?>