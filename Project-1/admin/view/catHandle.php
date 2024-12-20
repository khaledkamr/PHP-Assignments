<?php 
require_once "../../dbConnection.php";

if(isset($_POST["add"])) {
    trim(htmlspecialchars(extract($_POST)));

    $query = "INSERT INTO category(`name`) VALUES('$title')";
    $res = mysqli_query($conn, $query);
    if($res) {
        $_SESSION["success"] = "category added successfully";
        header("location:addCategory.php");
    }
    
}
else {
    header("location:404.php");
}