<?php
foreach ($_POST as $i) {
        $i = htmlspecialchars($i, ENT_QUOTES, 'UTF-8');
}

$owner = $_POST['name'];
$pfp = $_POST['input'];
$password = $_POST['pass1'];

if (realpath("user/$owner") !== false && is_dir(realpath("user/$owner"))) {
        header("Location: failed.html");
        exit("User already exists");
}
mkdir("user/$owner");

$social = array(
        'discord' => $_POST['discord'],
        'instagram' => $_POST['instagram'],
        'reddit' => $_POST['reddit'],
        'spotify' => $_POST['spotify'],
        'steam' => $_POST['steam']
);
asort($social);

$conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");

$sql = "create table $owner( 
        id int(9) unsigned auto_increment primary key, 
        postAuth varchar(25) not null, 
        question varchar(400) not null, 
        time varchar(40) not null, 
        repliedBool boolean default false, 
        answer varchar(400), 
        answerTime varchar(40)
        )";
$conn->query($sql);

$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "insert into passwords (user, password) values ('$owner', '$hash')";
$conn->query($sql);

$index = fopen("user/$owner/index.php", "w");
$login = fopen("user/$owner/login.php", "w");
$respond = fopen("user/$owner/respond.php", "w");

$indexcont = file_get_contents("user/template/index.php");
$logincont = file_get_contents("user/template/login.php");
$respondcont = file_get_contents("user/template/respond.php");

$indexcont = str_replace("newuser", $owner, $indexcont);
$indexcont = str_replace("link-to-pfp", $pfp, $indexcont);
$logincont = str_replace("newuser", $owner, $logincont);
$respondcont = str_replace("newuser", $owner, $respondcont);
$respondcont = str_replace("link-to-pfp", $pfp, $respondcont);

if ($dcordname != '') {
        $indexcont = str_replace("discord_tag", $dcordname, $indexcont);
        $respondcont = str_replace("discord_tag", $dcordname, $respondcont);
}
else {
        $indexcont = str_replace("discord_tag", "", $indexcont);
        $respondcont = str_replace("discord_tag", "", $respondcont);
}

$socbool = FALSE;
foreach ($social as $url) {
        if ($url != '') {
                $socbool = TRUE;
                $soccont = '<div id="social">' . PHP_EOL;
                foreach ($social as $site => $url) {
                        if ($url != '') {
                                $soccont .= "<a href=\"$url\"><img src=\"../../assets/$site.png\" width=\"35px\"></a>" . PHP_EOL;
                        }
                }
                break;
        }
}

if ($socbool) {
        $soccont .= "</div>" . PHP_EOL;
        $indexcont = str_replace("social", $soccont, $indexcont);
        $respondcont = str_replace("social", $soccont, $respondcont);
}
else {
        $indexcont = str_replace("social", "", $indexcont);
        $respondcont = str_replace("social", "", $respondcont);
}

fwrite($index, $indexcont);
fwrite($login, $logincont);
fwrite($respond, $respondcont);
fclose($index);
fclose($login);
fclose($respond);
$conn->close();

header("Location: user/$owner");

?>