<?php
asort($_POST);
foreach ($_POST as $i) {
        $i = htmlspecialchars($i, ENT_QUOTES, 'UTF-8');
}

$owner = $_SERVER['QUERY_STRING'];
$passinp = $_POST['pass'];

$conn = new mysqli("localhost", "qcard", "5DC9n4Pcwj", "qcard");
$sql = "select password from passwords where user='$owner'";
$return = $conn->query($sql);
$return = $return->fetch_assoc();
$passdat = $return['password'];
$conn->close();

$valid = password_verify($passinp, $passdat);
if ($valid) {
    setcookie("logged", $owner, null, "/");
    header("Location: ../user/$owner/respond.php");
}
else {
    header("Location: ../user/$owner/login.php");
}
?>