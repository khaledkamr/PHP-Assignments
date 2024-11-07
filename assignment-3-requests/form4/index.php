<?php
    $firstNameError = "";
    $lastNameError = "";
    $emailError = "";
    $mobileError = "";
    $passwordError = "";
    $confirmPasswordError = "";
    $detailsError = "";
    $errors = false;
    $errorArr = [];

    if(isset($_POST["submit"]))
    {
        trim(htmlspecialchars(extract($_POST)));

        if(empty($fname)) {
            $firstNameError = "First name is required";
            $errors = true;
            $errorArr[] = $firstNameError;
        }
        elseif(preg_match("/\d/", $fname)) {
            $firstNameError = "Digits are not allowed";
            $errors = true;
            $errorArr[] = $firstNameError;
        }
        elseif(strlen($fname) < 5) {
            $firstNameError = "The first name must be at least 5 characters.";
            $errors = true;
            $errorArr[] = $firstNameError;
        }

        if(empty($lname)) {
            $lastNameError = "Last name is required";
            $errors = true;
            $errorArr[] = $lastNameError;
        }
        elseif(preg_match("/\d/", $lname))  {
            $lastNameError = "Digits are not allowed";
            $errors = true;
            $errorArr[] = $lastNameError;
        }
        elseif(strlen($lname) < 5) {
            $lastNameError = "The last name must be at least 5 characters.";
            $errors = true;
            $errorArr[] = $lastNameError;
        }

        if(empty($email)) {
            $emailError = "Email is required.";
            $errors = true;
            $errorArr[] = $emailError;
        }
        // elseif(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $emailError = "Invalid email address.";
        //     $errors = true;
        //     $errorArr[] = $emailError;
        // }

        if(empty($mobile)) {
            $mobileError = "Mobile number is required.";
            $errors = true;
            $errorArr[] = $mobileError;
        }
        elseif(!is_numeric($mobile)) {
            $mobileError = "Please enter a valid number";
            $errors = true;
            $errorArr[] = $mobileError;
        }

        if(empty($password)) {
            $passwordError = "Password is required";
            $errors = true;
            $errorArr[] = $passwordError;
        }
        elseif(!preg_match("/[A-Z]/", $password) || !preg_match("/[a-z]/", $password) || !preg_match("/\d/", $password) || !preg_match('/[^a-zA-Z0-9_]/', $password) || preg_match("/\s/", $password) || strlen($password) < 8) {
            $passwordError = "Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
            $errors = true;
            $errorArr[] = $passwordError;
        }

        if(empty($confirmPassword)) {
            $confirmPasswordError = "Please confirm your password";
            $errors = true;
            $errorArr[] = $confirmPasswordError;
        }
        elseif($confirmPassword != $password) {
            $confirmPasswordError = "Confirm password does not match";
            $errors = true;
            $errorArr[] = $confirmPasswordError;
        }

        if(empty($details)) {
            $detailsError = "The details field is required.";
            $errors = true;
            $errorArr[] = $detailsError;
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
            <div class="col-md-6 offset-md-3">
                <?php if($errors): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            <?php foreach($errorArr as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name">
                            <small class="text-danger"><?php echo $firstNameError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name">
                            <small class="text-danger"><?php echo $lastNameError; ?></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            <small class="text-danger"><?php echo $emailError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile No:</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number">
                            <small class="text-danger"><?php echo $mobileError; ?></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            <small class="text-danger"><?php echo $passwordError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                            <small class="text-danger"><?php echo $confirmPasswordError; ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" id="details" name="details" rows="4" placeholder="Enter details"></textarea>
                        <small class="text-danger"><?php echo $detailsError; ?></small>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
