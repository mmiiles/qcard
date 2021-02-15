<!DOCTYPE html>
<html>
    <head>
        <title>QCard - miiles_417</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="../../style/land.css" rel="stylesheet">
        <link href="../../style/port.css" rel="stylesheet" >
        <script src="../../GET/logcheck.js"></script>
        <script src="../../GET/formcheck.js"></script>
        <script>logcheck("miiles_417")</script>
    </head>
    <body>
        <div id="header">
            Your QCard
        </div>
        <div id="card" align="center">
            <img src="https://pbs.twimg.com/profile_images/1347242961835274240/UZtuwKky_400x400.jpg" width="50%" style="border-radius: 100%;"><br>
            miiles#5122
            
        </div>
        <div id="postcont">
            <?php
            include('../../GET/getposts.php');
            postPrivate("miiles_417");
            ?>
        </div>
    </body>
</html>