<?php
function sanitize($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
$post = array_map("sanitize", $post);

date_default_timezone_set("America/Detroit");
$t = date("Y-m-d h:i:sa") . " EST";

$authval = $_POST['name'];
$quesval = $_POST['input'];
$ownval = $_SERVER['QUERY_STRING'];

$conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");
$sql = "INSERT INTO $ownval (postAuth, question, time) VALUES ('$authval', '$quesval', '$t')";
$conn->query($sql);
$conn->close();

header("Location: ../user/$ownval");
?>