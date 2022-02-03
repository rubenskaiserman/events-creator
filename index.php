<?php 
    include 'classes/classes.php'; 
    ini_set('display_errors', 1);

    $resource = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
    // echo $_COOKIE["userId"]
//     if($_POST != null){
//         if($_POST["is-signing-up"]=="on"){
//             session_start();
//             $user = new User($_POST["email"], $_POST["name"]);
//             $user->createUser($resource, $_POST["password"]);
//             $_SESSION["name"] = $user->name;
//             $_SESSION["email"] = $user->email;
//             $_SESSION["userId"] = $user->userId;
//             setcookie("userId", $_SESSION["userId"],time() + 60 * 60 * 3);
            
//         }
//         else if($_POST["is-login-in"]=="on"){
//             pg_send_query($resource, "SELECT * FROM users WHERE email = '{$_POST["email"]}'");
//             $query = pg_get_result($resource);
//             $password = pg_fetch_result($query, 0, "password");

//             if (!$password == $_POST["password"]){
//                 header("Location: login/index.html"); 

//             } else {
//                 session_start();
//                 $user = new User($_POST["email"], pg_fetch_result($query, 0, "name"));
//                 $user->userId = pg_fetch_result($query, 0, "userId");
//                 $_SESSION["name"] = $user->name;
//                 $_SESSION["email"] = $user->email;
//                 $_SESSION["userId"] = $user->userId;
//                 setcookie("userId",$_SESSION["userId"], time() + 60 * 60 * 3); //Aumentar o tempo depois

//             }
//         }

//     }else if(!isset($_COOKIE["userId"])){
//         header("Location: login/index.html");
//     } else {
//         pg_send_query($resource, "SELECT * FROM users WHERE userid = '{$_COOKIE["userId"]}'");
//         $query = pg_get_result($resource);
//         session_start();
//         $user = new User(pg_fetch_result($query, 0, "email"), pg_fetch_result($query, 0, "name"));
//         $user->userId = $_COOKIE["userId"];
//         $_SESSION["name"] = $user->name;
//         $_SESSION["email"] = $user->email;
//         $_SESSION["userId"] = $user->userId;
//     }

// ?>


<html>
    <head>
        <title>Eventating</title>
        
        <meta charset="utf-8">
        <meta name="description" content="This is a personal calendar where you can control your events">

        <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
        <link rel="shortcut icon" href="images/calendar.png" type="image/png">
        <script src="js/main.js?v=<?php echo time();?>"></script>

    </head>
    <body>
        <header>
        <li><a href="../events-creator-master/index.php"><img src="images/logo.png" alt="Eventating"></a></li>
        <button class="custom-btn btn">Log Out</button>
        </header>
        <main>
            <?php
                $conn = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
                pg_send_query($conn, "SELECT * FROM events WHERE userid = '{$_COOKIE["userId"]}'");
                $res = pg_get_result($resource);
                $length = pg_num_rows($res);
                for($i = 0; $i < $length; $i ++){
                    $title = pg_fetch_result($res, $i, "title");
                    $date = pg_fetch_result($res, $i, "startdate");
                    $discription = pg_fetch_result($res, $i, "discription");
                    $eventId = pg_fetch_result($res, $i, "eventid");
                    echo "
                    <div class='event'>
                        <h2 class='title'> $title </h2>
                        <form method='post' action='delete-event.php'>
                            <input type='text' hidden value='$eventId' name='event'>
                            <input type='submit' value='delete'>

                        </form>
                         
                        <p class='start-date'> $date </p> 
                        <br>
                        <h3 class='discription'> $discription </h3>
                    </div>
                    ";
                }
            ?>
        </main>
        <form id="adding" method="post" action="create-event.php">
            <input type="text" name="title" placeholder="Title" required id="title" autofocus> <br>
            <textarea type="text" name="discription" placeholder="Discription" id="discription" contenteditable='true'></textarea><br>
            <input type="date" name="startdate" required> <br>
            <input type="date" name="enddate" placeholder="End date" required> <br>
            <input type="checkbox" onclick="unableTime()" id="all-day"> <span>All day(s)</span> <br>
            <input type="time" name="starthour" value="10:00" class="time"> <br>
            <input type="time" name="endhour" value="23:59" class="time"> <br>
            <input class="custom-btn btn" type="submit">
            <button class="custom-btn btn" onclick="hideForm()">Cancel</button>
        </form>

        <button id="add" onclick="showForm()" >
            +
        </button>
    </body>
</html>