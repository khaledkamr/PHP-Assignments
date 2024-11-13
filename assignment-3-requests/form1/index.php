<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Validation</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <?php
        session_start();
        $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : array();

        $firstNameError = isset($errors["firstName"]) ? $errors["firstName"] :  "";
        $lastNameError = isset($errors["lastName"]) ? $errors["lastName"] :  "";
        $emailError = isset($errors["email"]) ? $errors["email"] :  "";
        $passwordError = isset($errors["password"]) ? $errors["password"] :  "";
        $confirmPasswordError = isset($errors["confirmPassword"]) ? $errors["confirmPassword"] :  "";

        $fname = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "";
        $lname = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "";
        $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">CRete</h1>
        <form action="handle.php" method="post" class="p-4 shadow-sm rounded border">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="fname" class="form-control" placeholder="Enter first name" value="<?php echo $fname; ?>">
                <small class="text-danger"><?php echo $firstNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="lname" class="form-control" placeholder="Enter last name" value="<?php echo $lname; ?>">
                <small class="text-danger"><?php echo $lastNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" value="<?php echo $email; ?>">
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
?>