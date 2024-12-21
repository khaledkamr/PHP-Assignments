<?php
require_once 'dbConnection.php';

if(isset($_POST["addToCart"])) {
    trim(htmlspecialchars(extract($_POST)));
    
    $query = "INSERT INTO cart(`product_id`, `quantity`) VALUES($id, $quantity)";
    $res = mysqli_query($conn, $query);
    if($res) {
        $_SESSION["success_cart"] = "added to the cart";
    }
    header("location:shop.php?id=$id");
}
else {
    header("location:404.php");
}