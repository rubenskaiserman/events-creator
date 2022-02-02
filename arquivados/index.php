<?php 
    include "classes/classes.php";
    
    if($_POST["isSigning"] == 1){
        $user = new User($_POST["email"], $_POST["name"], $_POST["password"]);
        session_start();
        $_SESSION["email"] = $user->email;
        $_SESSION["name"] = $user->name;
    }
    

?>
<html>
    <head>
        <title>User's Calendar</title>
        
        <meta charset="utf-8">
        <meta name="description" content="This is a personal calendar where you can control your events">

        <link rel="stylesheet" href="css/index.css">

    </head>
    <body>
        <header>
            <li><h1>Calendar</h1></li>
            <li><a href="signup/index.html"><button>sign-up</button></li></a>
            <li><button>Login</button></li>
        </header>
        <main>

            <table>
                <tr>
                    <th> <span style="font-size: 300%; font-weight: 900;"><</span> </th>
                    <th><h2>month</h2></th>
                    <th> <span style="font-size: 300%; font-weight: 900;">></span></th>
                </tr>
                <tr>
                    <th>S</th>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>
        </main>
        <div id="info">
            A calendar is a system of organizing days. This is done by giving names to periods of time, typically days, weeks, months and years. A date is the designation of a single, specific day within such a system. A calendar is also a physical record (often paper) of such a system. A calendar can also mean a list of planned events, such as a court calendar or a partly or fully chronological list of documents, such as a calendar of wills.<br>
            Periods in a calendar (such as years and months) are usually, though not necessarily, synchronized with the cycle of the sun or the moon. The most common type of pre-modern calendar was the lunisolar calendar, a lunar calendar that occasionally adds one intercalary month to remain synchronized with the solar year over the long term. <br><br>
            <span style="text-align: right;">Source: Wikipidia</span>
        </div>
    </body>
</html>