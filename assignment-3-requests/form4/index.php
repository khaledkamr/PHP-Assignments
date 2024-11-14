<?php
    session_start();
    $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : array();

    $firstNameError = isset($errors["fname"]) ? $errors["fname"] : "";
    $lastNameError = isset($errors["lname"]) ? $errors["lname"] : "";
    $emailError = isset($errors["email"]) ? $errors["email"] : "";
    $mobileError = isset($errors["mobile"]) ? $errors["mobile"] : "";
    $passwordError = isset($errors["password"]) ? $errors["password"] : "";
    $confirmPasswordError = isset($errors["passwordConfirm"]) ? $errors["passwordConfirm"] : "";
    $detailsError = isset($errors["details"]) ? $errors["details"] : "";

    $fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
    $lname = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $mobile = isset($_SESSION["mobile"]) ? $_SESSION["mobile"] : "";
    $details = isset($_SESSION["details"]) ? $_SESSION["details"] : "";
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
            <div class="col-md-6 offset-md-3  p-4 shadow-sm rounded border">
                <h2 class="text-center pb-5">Create Account</h2>
                <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            <?php foreach($errors as $key => $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="handle.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="Enter your first name" value="<?php echo $fname; ?>">
                            <small class="text-danger"><?php echo $firstNameError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Enter your last name" value="<?php echo $lname; ?>">
                            <small class="text-danger"><?php echo $lastNameError; ?></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email"  value="<?php echo $email; ?>">
                            <small class="text-danger"><?php echo $emailError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile No:</label>
                            <input type="text" class="form-control" name="mobile" placeholder="Enter your mobile number" value="<?php echo $mobile; ?>">
                            <small class="text-danger"><?php echo $mobileError; ?></small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                            <small class="text-danger"><?php echo $passwordError; ?></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm your password">
                            <small class="text-danger"><?php echo $confirmPasswordError; ?></small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <textarea class="form-control" name="details" rows="4" placeholder="Enter details"><?php echo $details; ?></textarea>
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

<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["fname"]);
    unset($_SESSION["lname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["mobile"]);
    unset($_SESSION["details"]);
?>