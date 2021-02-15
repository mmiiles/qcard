<!DOCTYPE html>
<html>
    <head>
        <title>QCard - miiles_417</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../style/land.css" rel="stylesheet">
        <link href="../../style/port.css" rel="stylesheet">
        <script src="../../GET/formcheck.js"></script>
    </head>
    <body>
        <div id="login">
            <a href="respond.php" style="text-decoration: none; color: white;">Login and respond</a>
        </div>
        <div id="header">
            <div id="twlink">
                <a href="https://twitter.com/miiles_417" style="text-decoration: none; color: white;">@miiles_417's</a>
            </div>
            <div id="qctitle">
                QCard
            </div>
        </div>
        <div align="center" id="card">
            <img src="https://pbs.twimg.com/profile_images/1347242961835274240/UZtuwKky_400x400.jpg" width="50%" style="border-radius: 100%;"><br>
            miiles#5122
            
        </div>
        <div id="reminder">
            If you want notifications, follow @qcardsite on twitter and put your twitter handle (with the @ symbol) as your name
        </div>
        <div align="center" id="ask">
            <form action="../../POST/make.php?miiles_417" enctype="multipart/form-data" name="post" method="post" onsubmit="return formcheck(1)" required>
                <p>If you don't want to put your name, just type "Anonymous"</p>
                <input class="inputs"  name="name" type="text" placeholder="What should we call you?"><br><br>
                <textarea class="inputs" name="input" rows="6" placeholder="Ask a question"></textarea><br><br>
                <button class="inpts" id="asksubmit" type="submit">Ask</button>
            </form>
        </div>
        <div id="postcont">
            <?php
            include('../../GET/getposts.php');
            postPublic("miiles_417");
            ?>
        </div>
    </body>
</html>