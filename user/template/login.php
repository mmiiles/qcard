<!DOCTYPE html>
<html>
    <head>
        <title>QCard - Login</title>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="../../style/land.css" rel="stylesheet">
        <link href="../../style/port.css" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <div id="twlink">
                <a href="https://twitter.com/newuser" style="text-decoration: none; color: white;">@newuser's</a>
            </div>
            <div id="qctitle">
                QCard Login
            </div>
        </div>
        <br>
        <div align="center">
            <form id="loginform" action="../../POST/login.php?newuser" method="POST" enctype="multipart/form-data">
                <input class="inputs" name="pass" placeholder="What's the password?" type="password"><br><br>
                <button class="inputs" id="logsubmit" type="submit">Log In</button>
            </form>
        </div>
    </body>
</html>