<?php

if(isset($_COOKIE["background"])) {
    echo "<style>body { background-color: " . $_COOKIE["background"] . " }</style>";
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie("background", $_POST["bg-color"], strtotime("+1 year"));
    header("location: ". $_SERVER["REQUEST_URI"]);
    exit();
}

?>

<form action="" method="post">
    <input type="color" name="bg-color">
    <input type="submit" value="Choose color">
</form>