<?php
foreach ($_POST as $i) {
        $i = htmlspecialchars($i, ENT_QUOTES, 'UTF-8');
}

date_default_timezone_set("America/Detroit");
$t = date("Y-m-d h:i:sa") . " EST";

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

$postid = $queries['postid'];
$ownval = $queries['ownval'];
$repval = $_POST['input'];

$conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");
$sql = "update $ownval set repliedBool = 1, answer = '$repval', answerTime = '$t' where id='$postid';";
$conn->query($sql);
$conn->close();

header("Location: ../user/$ownval/respond.php");
?>