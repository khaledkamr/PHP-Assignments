<?php 
require_once "../../dbConnection.php";

if(isset($_POST["add"])) {
    trim(htmlspecialchars(extract($_POST)));
    $errors = [];
    
    $img = $_FILES["image"];
    $imgName = $img["name"];
    $imgTmpName = $img["tmp_name"];
    $imgError = $img["error"];
    $targetFile = "../../img/products/" . $imgName;
    $imgType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowed_types = ["jpg", "png", "jpeg", "gif"];

    if(empty($category)) {
        $errors[] = "category is required";
    } elseif(!is_numeric($category)) {
        $errors[] = "enter the id of the category";
    }

    if(empty($title)) {
        $errors[] = "title is required";
    }

    if(!is_numeric($price)) {
        $errors[] = "price must be a number";
    }

    if(!is_numeric($quantity)) {
        $errors[] = "quantity must be a number";
    }

    if(empty($imgName)) {
        $errors[] = "No file found";
    } elseif ($imgError != 0) {
        $errors[] = "image not correct";
    } elseif(file_exists($targetFile)) {
        $errors[] = "Sorry, file already exists";
    } elseif (!in_array($imgType, $allowed_types)) {
        $errors[] = "Only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if(empty($errors)) {
        move_uploaded_file($imgTmpName, $targetFile);

        $query = "INSERT INTO product(`name`, `description`, `price`, `category_id`, `image`, `quantity`)
            VALUES('$title', '$desc', $price, $category, '$imgName', $quantity)";
        $res = mysqli_query($conn, $query);
        if($res) {
            $_SESSION["success_product"] = "product added successfully";
        }

        header("location:addProduct.php");
    }
    else {
        $_SESSION["errors"] = $errors;
        $_SESSION["category"] = $category;
        $_SESSION["title"] = $title;
        $_SESSION["desc"] = $desc;
        $_SESSION["price"] = $price;
        $_SESSION["quantity"] = $quantity;

        header("location:addProduct.php");
    }
}
else {
    header("location:404.php");
}