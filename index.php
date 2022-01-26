<?php 
    include 'classes/classes.php'; 
    ini_set('display_errors', 1);

    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");

    if(!isset($_SESSION)){
        if($_POST["is-signing-up"]=="on"){
            session_start();
            $user = new User($_POST["email"], $_POST["name"], $_POST["password"]);
            $user->createUser($resource);
            $_SESSION["name"] = $user->name;
            $_SESSION["email"] = $user->email;
            $_SESSION["userId"] = $user->userId;
            
        }
        else if($_POST["is-login-in"]=="on"){
            pg_send_query($resource, "SELECT * FROM users WHERE email = '{$_POST["email"]}'");
            $query = pg_get_result($resource);
            $password = pg_fetch_result($query, 0, "password");

            if (!$password == $_POST["password"]){
                header("Location: login/index.html"); 

            } else {
                session_start();
                $user = new User($_POST["email"], pg_fetch_result($query, 0, "name"), $password);
                $user->userId = pg_fetch_result($query, 0, "userId");
                $_SESSION["name"] = $user->name;
                $_SESSION["email"] = $user->email;
                $_SESSION["userId"] = $user->userId;

            }
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