<?php
    session_start();
    $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : array();

    $idError = isset($errors["id"]) ? $errors["id"] : "";
    $passwordError = isset($errors["password"]) ? $errors["password"] : "";
    $nameError = isset($errors["name"]) ? $errors["name"] : "";
    $countryError = isset($errors["country"]) ? $errors["country"] : "";
    $zipCodeError = isset($errors["zipCode"]) ? $errors["zipCode"] : "";
    $emailError = isset($errors["email"]) ? $errors["email"] : "";
    $sexError = isset($errors["sex"]) ? $errors["sex"] : "";
    $langError = isset($errors["lang"]) ? $errors["lang"] : "";

    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
    $name = isset($_SESSION["name"]) ? $_SESSION["name"] : "";
    $address = isset($_SESSION["address"]) ? $_SESSION["address"] : "";
    $country = isset($_SESSION["country"]) ? $_SESSION["country"] : "";
    $zipCode = isset($_SESSION["zipCode"]) ? $_SESSION["zipCode"] : "";
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $about = isset($_SESSION["about"]) ? $_SESSION["about"] : "";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Form</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container mt-5">
            <h1 class="text-center mb-4">Registration Form</h1>
            <form action="handle.php" method="post" class="p-4 shadow-sm rounded border">
                <div class="form-group">
                    <label>User ID:</label>
                    <input type="text" name="id" class="form-control" placeholder="Enter User ID" value="<?php echo $id; ?>">
                    <small class="text-danger"><?php echo $idError; ?></small>
                </div>

                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    <small class="text-danger"><?php echo $passwordError; ?></small>
                </div>

                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="<?php echo $name; ?>">
                    <small class="text-danger"><?php echo $nameError; ?></small>
                </div>

                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo $address; ?>">
                </div>

                <div class="form-group">
                    <label>Country:</label>
                    <select name="country" class="form-control">
                        <option value="eg">Egypt</option>
                        <option value="us">United States</option>
                        <option value="ksa">Saudi Arabia</option>
                        <option value="au">Australia</option>
                        <option value="in">India</option>
                    </select>
                    <small class="text-danger"><?php echo $countryError; ?></small>
                </div>

                <div class="form-group">
                    <label>ZIP Code:</label>
                    <input type="number" name="zipCode" class="form-control" placeholder="Enter ZIP Code" value="<?php echo $zipCode; ?>">
                    <small class="text-danger"><?php echo $zipCodeError; ?></small>
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>">
                    <small class="text-danger"><?php echo $emailError; ?></small>
                </div>

                <div class="form-group">
                    <label>Sex:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="sex" value="male" class="form-check-input">
                        <label class="form-check-label">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" name="sex" value="female" class="form-check-input">
                        <label class="form-check-label">Female</label>
                    </div>
                    <small class="text-danger"><?php echo $sexError; ?></small>
                </div>

                <div class="form-group">
                    <label>Languages:</label><br>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="lang[]" value="english" class="form-check-input">
                        <label class="form-check-label">English</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="lang[]" value="arabic" class="form-check-input">
                        <label class="form-check-label">Arabic</label>
                    </div>
                    <small class="text-danger"><?php echo $langError; ?></small>
                </div>

                <div class="form-group">
                    <label>About:</label>
                    <textarea name="about" class="form-control" placeholder="Tell us about yourself"><?php echo $about ?></textarea>
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>

<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["address"]);
    unset($_SESSION["country"]);
    unset($_SESSION["zipCode"]);
    unset($_SESSION["email"]);
    unset($_SESSION["about"]);
?>