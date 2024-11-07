<?php
    $firstNameError = "";
    $lastNameError = "";
    $emailError = "";
    $passwordError = "";
    $confirmPasswordError = "";

    if(isset($_POST["submit"]))
    {
        trim(htmlspecialchars(extract($_POST)));

        if(empty($fname)) {
            $firstNameError = "First name is required";
        } elseif(preg_match("/\d/", $fname))  {
            $firstNameError = "Digits are not allowed";
        }

        if(empty($lname)) {
            $lastNameError = "Last name is required";
        } elseif(preg_match("/\d/", $lname)) {
            $lastNameError = "Digits are not allowed";
        }

        if(empty($email)) {
            $emailError = "Email is required";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Invalid email address";
        }

        if(empty($password)) {
            $passwordError = "Password is required";
        } elseif(!preg_match("/[A-Z]/", $password) ||
                 !preg_match("/[a-z]/", $password) || 
                 !preg_match("/\d/", $password) || 
                 !preg_match('/[^a-zA-Z0-9_]/', $password) || 
                 preg_match("/\s/", $password) || 
                 strlen($password) < 8) {
            $passwordError = "Password must contain at least one uppercase letter, one lowercase letter, a digit, a special character, and be at least 8 characters long with no spaces";
        }

        if(empty($confirmPassword)) {
            $confirmPasswordError = "Please confirm your password";
        } elseif($confirmPassword != $password) {
            $confirmPasswordError = "Confirm password does not match";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Validation with Bootstrap</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">PHP Form Validation</h1>
        <form action="" method="post" class="p-4 shadow-sm rounded border">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter first name">
                <small class="text-danger"><?php echo $firstNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter last name">
                <small class="text-danger"><?php echo $lastNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email">
                <small class="text-danger"><?php echo $emailError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                <small class="text-danger"><?php echo $passwordError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" placeholder="Confirm your password">
                <small class="text-danger"><?php echo $confirmPasswordError; ?></small>
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
