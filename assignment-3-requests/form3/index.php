<?php
    $idError = "";
    $passwordError = "";
    $nameError = "";
    $countryError = "";
    $zipCodeError = "";
    $emailError = "";
    $sexError = "";
    $langError = "";
    $error = false;

    if(isset($_POST["submit"]))
    {
        extract($_POST);
        $id = trim(htmlspecialchars($id));
        $password = trim(htmlspecialchars($password));
        $name = trim(htmlspecialchars($name));
        $country = trim(htmlspecialchars($country));
        $zipCode = trim(htmlspecialchars($zipCode));
        $email = trim(htmlspecialchars($email));
        $sex = isset($sex) ? trim(htmlspecialchars($sex)) : '';
        $lang = isset($lang) ? $_POST['lang'] : [];
        $address = trim(htmlspecialchars($address));
        $about = trim(htmlspecialchars($about));

        if(empty($id)) {
            $idError = "Required";
            $error = true;
        } elseif(strlen($id) < 5 || strlen($id) > 12) {
            $idError = "ID must be of length 5 to 12";
            $error = true;
        }

        if(empty($password)) {
            $passwordError = "Required";
            $error = true;
        } elseif(strlen($password) < 7 || strlen($password) > 12) {
            $passwordError = "Password must be of length 7 to 12";
            $error = true;
        }

        if(empty($name)) {
            $nameError = "Required";
            $error = true;
        } elseif(preg_match("/\d/", $name)) {
            $nameError = "Alphabets only allowed";
            $error = true;
        }

        if(empty($country)) {
            $countryError = "Required, must select a country";
            $error = true;
        }

        if(empty($zipCode)) {
            $zipCodeError = "Required";
            $error = true;
        } elseif(!is_numeric($zipCode)) {
            $zipCodeError = "ZIP code must be numeric";
            $error = true;
        }

        if(empty($email)) {
            $emailError = "Required";
            $error = true;
        }
        // elseif(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $emailError = "The email must be valid";
        //     $error = true;
        // }

        if(empty($sex)) {
            $sexError = "Required";
            $error = true;
        }

        if(empty($lang)) {
            $langError = "Required";
            $error = true;
        }

        if(!$error) {
            session_start();
            $_SESSION["id"] = $id;
            $_SESSION["password"] = $password;
            $_SESSION["name"] = $name;
            $_SESSION["address"] = $address;
            $_SESSION["country"] = $country;
            $_SESSION["zipCode"] = $zipCode;
            $_SESSION["email"] = $email;
            $_SESSION["sex"] = $sex;
            $_SESSION["lang"] = $lang;
            $_SESSION["about"] = $about;
            header("location: result.php");
        }
    }
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
        <form action="" method="post" class="p-4 shadow-sm rounded border">
            <div class="form-group">
                <label>User ID:</label>
                <input type="text" name="id" class="form-control" placeholder="Enter User ID">
                <small class="text-danger"><?php echo $idError; ?></small>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <small class="text-danger"><?php echo $passwordError; ?></small>
            </div>

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                <small class="text-danger"><?php echo $nameError; ?></small>
            </div>

            <div class="form-group">
                <label>Address:</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
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
                <input type="number" name="zipCode" class="form-control" placeholder="Enter ZIP Code">
                <small class="text-danger"><?php echo $zipCodeError; ?></small>
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
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
                <textarea name="about" class="form-control" placeholder="Tell us about yourself"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
