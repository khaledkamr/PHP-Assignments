<?php 
    $titleError = "";
    $descriptionError = "";
    $priceError = "";
    $quantityError = "";
    $imgError = "";
    $valid = true;

    if(isset($_POST["submit"])) {
        trim(htmlspecialchars(extract($_POST)));

        $img = $_FILES["image"];
        $imgName = $img["name"];
        $imgTmpName = $img["tmp_name"];
        $targetFile = "Uploads/" . $imgName;
        $imgType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if(empty($title)) {
            $titleError = "Required";
            $valid = false;
        }

        if(empty($description)) {
            $descriptionError = "Required";
            $valid = false;
        }

        if(empty($price)) {
            $priceError = "Required";
            $valid = false;
        }
        elseif(!is_numeric($price)) {
            $priceError = "Enter a valid number";
            $valid = false;
        }

        if(empty($quantity)) {
            $quantityError = "Required";
            $valid = false;
        }
        elseif(!is_numeric($quantity)) {
            $quantityError = "Enter a valid number";
            $valid = false;
        }

        $allowed_types = ["jpg", "png", "jpeg", "gif"];
        if(empty($imgName)) {
            $imgError = "No file found";
            $valid = false;
        }
        elseif(file_exists($targetFile)) {
            $imgError = "Sorry, file already exists";
            $valid = false;
        }
        elseif (!in_array($imgType, $allowed_types)) {
            $imgError = "Only JPG, JPEG, PNG & GIF files are allowed.";
            $valid = false;
        }

        if($valid) {
            move_uploaded_file($imgTmpName, $targetFile);
        }
    }
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
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Title:</label>
                            <input type="text" class="form-control" name="title">
                            <small class="text-danger"><?php echo $titleError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description">
                            <small class="text-danger"><?php echo $descriptionError; ?></small>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Price:</label>
                            <input type="text" class="form-control" name="price">
                            <small class="text-danger"><?php echo $priceError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Quantity:</label>
                            <input type="text" class="form-control" name="quantity">
                            <small class="text-danger"><?php echo $quantityError; ?></small>
                        </div>
                    </div>
                    
                    <label>Upload image:</label>
                    <div class="custom-file mb-4">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <small class="text-danger"><?php echo $imgError; ?></small>
                    </div>


                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <br>
        
        <?php if(isset($_POST["submit"]) && $valid): ?>
            <div class="card mt-5" style="width: 18rem;">
                <img src="<?php echo $targetFile; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $title; ?></h5>
                    <p class="card-text"><?php echo $description; ?></p>
                    <p class="card-text"><strong>Price:</strong> $<?php echo $price; ?></p>
                    <p class="card-text"><strong>Quantity:</strong> <?php echo $quantity; ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
