<?php
    session_start();
    $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : array();

    $titleError = isset($errors["title"]) ? $errors["title"] :  "";
    $descriptionError = isset($errors["description"]) ? $errors["description"] :  "";
    $priceError = isset($errors["price"]) ? $errors["price"] :  "";
    $quantityError = isset($errors["quantity"]) ? $errors["quantity"] :  "";
    $imgError = isset($errors["img"]) ? $errors["img"] :  "";

    $title = isset($_SESSION["title"]) ? $_SESSION["title"] : "";
    $description = isset($_SESSION["description"]) ? $_SESSION["description"] : "";
    $price = isset($_SESSION["price"]) ? $_SESSION["price"] : "";
    $quantity = isset($_SESSION["quantity"]) ? $_SESSION["quantity"] : "";
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 p-4 shadow-sm rounded border">
                <h2 class="text-center pb-5">Product form</h2>
                <form action="handle.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Title:</label>
                            <input type="text" class="form-control" name="title" value="<?php echo $title; ?>">
                            <small class="text-danger"><?php echo $titleError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description" value="<?php echo $description; ?>">
                            <small class="text-danger"><?php echo $descriptionError; ?></small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Price:</label>
                            <input type="text" class="form-control" name="price"  value="<?php echo $price; ?>">
                            <small class="text-danger"><?php echo $priceError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Quantity:</label>
                            <input type="text" class="form-control" name="quantity"  value="<?php echo $quantity; ?>">
                            <small class="text-danger"><?php echo $quantityError; ?></small>
                        </div>
                    </div>
                    
                    <label>Upload image:</label>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <small class="text-danger"><?php echo $imgError; ?></small>
                    </div>
                    <br><br>

                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
    unset($_SESSION["errors"]);
    unset($_SESSION["title"]);
    unset($_SESSION["description"]);
    unset($_SESSION["price"]);
    unset($_SESSION["quantity"]);
?>