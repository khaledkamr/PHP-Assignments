<?php 
session_start();

$title = isset($_SESSION["title"]) ? $_SESSION["title"] : "";
$description = isset($_SESSION["description"]) ? $_SESSION["description"] : "";
$price = isset($_SESSION["price"]) ? $_SESSION["price"] : "";
$quantity = isset($_SESSION["quantity"]) ? $_SESSION["quantity"] : "";
$targetFile = isset($_SESSION["targetFile"]) ? $_SESSION["targetFile"] : "";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="card mt-5" style="width: 18rem;">
                <img src="<?php echo $targetFile; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <p class="card-text"><?php echo $description; ?></p>
                    <p class="card-text"><strong>Price:</strong> $<?php echo $price; ?></p>
                    <p class="card-text"><strong>Quantity:</strong> <?php echo $quantity; ?></p>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>