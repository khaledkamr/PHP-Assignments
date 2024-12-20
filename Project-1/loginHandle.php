<?php 

require_once 'dbConnection.php';

if(isset($_POST["login"])) {
    trim(htmlspecialchars(extract($_POST)));

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $query);
    if(mysqli_num_rows($res) == 1) {
        $user = mysqli_fetch_assoc($res);
        if($user["name"] == "admin") {
            header("location:admin/view/layout.php");
        }
        else {
            $_SESSION["success"] = "Hello, " . $user['name'];
            header("location:shop.php");
        }
    }
    else {
        $_SESSION["failed"] = "email or password incorrect";
        header("location:login.php");
    }
}
else {
    header("location:404.php");
}