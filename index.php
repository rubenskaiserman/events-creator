<?php 
    include 'classes/classes.php'; 

    if(!isset($_SESSION)){
        if($_POST["is-signing-up"] == "on"){
            session_start();
            $user = new User($_POST["email"], $_POST["name"], $_POST["password"]);
            ini_set('display_errors', 1);
            $user->createUser();
        }
        else{
            header("Location: login/index.html");
        }
        
    }



?>


<html>
    <head>
        <title>Eventating</title>
        
        <meta charset="utf-8">
        <meta name="description" content="This is a personal calendar where you can control your events">

        <link rel="stylesheet" href="css/main.css">
        <link rel="shortcut icon" href="images/calendar.png" type="image/png">
        <script src="js/main.js"></script>

    </head>
    <body>
        <header>
            <li><span>Eventating</span></li>
        </header>
        <main>
            <!-- Espaço para os eventos criados -->
        </main>
        <form id="adding" method="post" action="create-event.php">
            <input type="text" name="name" placeholder="Title" required id="title" autofocus> <br>
            <textarea type="text" name="discription" placeholder="Discription" id="discription" contenteditable='true'></textarea><br>
            <input type="date" name="start" placeholder="Start Date" required> <br>
            <input type="date" name="end" placeholder="End date" required> <br>
            <input type="checkbox" onclick="unableTime()" id="all-day"> <span>All day(s)</span> <br>
            <input type="time" name="shour" placeholder="10:00" class="time"> <br>
            <input type="time" name="ehour" placeholder="23:59" class="time"> <br>
            <input type="submit">
            <button onclick="hideForm()">Cancel</button>
        </form>

        <button id="add" onclick="showForm()" >
            +
        </button>
    </body>
</html>