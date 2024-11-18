<?php 
    session_start();

    if(isset($_POST["submit"])) {
        trim(htmlspecialchars(extract($_POST)));
        $errors = [];

        $img = $_FILES["image"];
        $imgName = $img["name"];
        $imgTmpName = $img["tmp_name"];
        $imgError = $img["error"];
        $targetFile = "Uploads/" . $imgName;
        $imgType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowed_types = ["jpg", "png", "jpeg", "gif"];

        if(empty($title)) {
            $errors["title"] = "Required";
        }

        if(empty($description)) {
            $errors["description"] = "Required";
        }

        if(empty($price)) {
            $errors["price"] = "Required";
        } elseif(!is_numeric($price)) {
            $errors["price"] = "Enter a valid number";
        }

        if(empty($quantity)) {
            $errors["quantity"] = "Required";
        } elseif(!is_numeric($quantity)) {
            $errors["quantity"] = "Enter a valid number";
        }

        if(empty($imgName)) {
            $errors["img"] = "No file found";
        } elseif ($imgError != 0) {
            $errors["img"] = "image not correct";
        } elseif(file_exists($targetFile)) {
            $errors["img"] = "Sorry, file already exists";
        } elseif (!in_array($imgType, $allowed_types)) {
            $errors["img"] = "Only JPG, JPEG, PNG & GIF files are allowed.";
        }

        $_SESSION["title"] = $title;
        $_SESSION["description"] = $description;
        $_SESSION["price"] = $price;
        $_SESSION["quantity"] = $quantity;
        $_SESSION["img"] = $imgName;
        $_SESSION["targetFile"] = $targetFile;

        if(!empty($errors)) {
            $_SESSION["errors"] = $errors;
            header("location: index.php");
        } else {
            move_uploaded_file($imgTmpName, $targetFile);
            header("location: product.php");
        }
    } else {
        header("location: index.php");
    }
?>
