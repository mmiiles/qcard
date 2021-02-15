<!DOCTYPE html>
<html>
    <head>
        <title>QCard - newuser</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="../../style/land.css" rel="stylesheet">
        <link href="../../style/port.css" rel="stylesheet" >
        <script src="../../GET/logcheck.js"></script>
        <script src="../../GET/formcheck.js"></script>
        <script>logcheck("newuser")</script>
    </head>
    <body>
        <div id="header">
            Your QCard
        </div>
        <div id="card" align="center">
            <img src="link-to-pfp" width="50%" style="border-radius: 100%;"><br>
            discord_tag
            social
        </div>
        <div id="postcont">
            <?php
            include('../../GET/getposts.php');
            postPrivate("newuser");
            ?>
        </div>
    </body>
</html>