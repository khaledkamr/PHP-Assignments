<?php
  session_start();
  $errors = isset($_SESSION["errors"]) ? $_SESSION["errors"] : array();

  $fullNameError = isset($errors["fullName"]) ? $errors["fullName"] : "";
  $emailError = isset($errors["email"]) ? $errors["email"] : "";
  $websiteError = isset($errors["website"]) ? $errors["website"] : "";
  $genderError = isset($errors["gender"]) ? $errors["gender"] : "";

  $fullName = isset($_SESSION["fullName"]) ? $_SESSION["fullName"] : "";
  $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
  $website = isset($_SESSION["website"]) ? $_SESSION["website"] : "";
  $comment = isset($_SESSION["comment"]) ? $_SESSION["comment"] : "";
  $gender = isset($_SESSION["gender"]) ? $_SESSION["gender"] : "";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Validation</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">PHP Form Validation</h1>
        <form action="handle.php" method="post" class="p-4 shadow-sm rounded border">
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="fullName" class="form-control" placeholder="Enter full name" value="<?php echo $fullName; ?>">
                <small class="text-danger"><?php echo $fullNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Email Address:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php echo $email; ?>">
                <small class="text-danger"><?php echo $emailError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Website:</label>
                <input type="url" name="website" class="form-control" placeholder="Enter website URL" value="<?php echo $website; ?>">
                <small class="text-danger"><?php echo $websiteError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Comment:</label>
                <textarea name="comment" class="form-control" placeholder="Enter your comment"></textarea>
            </div>
            
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="female" class="form-check-input">
                    <label class="form-check-label">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" name="gender" value="male" class="form-check-input">
                    <label class="form-check-label">Male</label>
                </div>
                <br>
                <small class="text-danger"><?php echo $genderError; ?></small>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
        </form>

        <h1 class="mt-5">final output: </h1>
        <?php
        if(empty($errors)) {
            echo $fullName . "<br>";
            echo $email . "<br>";
            echo $website . "<br>";
            echo $comment . "<br>";
            echo $gender . "<br>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>

<?php 
    unset($_SESSION["errors"]);
    unset($_SESSION["fullName"]);
    unset($_SESSION["email"]);
    unset($_SESSION["website"]);
    unset($_SESSION["comment"]);
    unset($_SESSION["gender"]);
?>