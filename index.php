<?php 
    if(!isset($_COOKIE["userId"])){
        header("Location: login/index.html");
    }
?>


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
        <li><a href="../index.php"><img src="images/logo.png" alt="Eventating"></a></li>
        <a href="logout/index.php"><button class="custom-btn btn">Log Out</button></a>
        </header>
        <main>
            <?php
                $conn = pg_connect("host=localhost port=5432 dbname=events_creator user=creator password=events") or die("could not connect");
                pg_send_query($conn, "SELECT * FROM events WHERE userid = '{$_COOKIE["userId"]}'");
                $res = pg_get_result($conn);
                $length = pg_num_rows($res);
                for($i = 0; $i < $length; $i ++){
                    $title = pg_fetch_result($res, $i, "title");
                    $dates = pg_fetch_result($res, $i, "startdate");
                    $hours = pg_fetch_result($res, $i, "starthour");
                    $houre = pg_fetch_result($res, $i, "endhour");
                    $datee = pg_fetch_result($res, $i, "enddate");
                    $discription = pg_fetch_result($res, $i, "discription");
                    $eventId = pg_fetch_result($res, $i, "eventid");
                    echo "
                    <div id='event'>
                        <h2 id='title'> $title </h2>
                        <form method='post' action='delete-event.php'>
                            <input type='text' hidden value='$eventId' name='event'>
                            <input class='custom-btn btn' type='submit' value='DELETE'>

                        </form>
                         
                        <p class='start-date'> start date: $dates </p>
                        <p class='start-hour'> start time: $hours </p>
                        <p class='end-date'> end day: $datee </p>
                        <p class='end-hour'> end time: $houre </p>  
                        <br>
                        <h3 id='discription'> $discription </h3>
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