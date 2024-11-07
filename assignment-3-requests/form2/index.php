<?php
    $fullNameError = "";
    $emailError = "";
    $websiteError = "";
    $commentError = "";
    $genderError = "";

    if(isset($_POST["submit"]))
    {
        extract($_POST);
        $fullName = trim(htmlspecialchars($fullName));
        $email = trim(htmlspecialchars($email));
        $website = trim(htmlspecialchars($website));
        $comment = trim(htmlspecialchars($comment));
        $gender = isset($gender) ? trim(htmlspecialchars($gender)) : '';

        if(empty($fullName)) {
            $fullNameError = "* Full name is required";
        } elseif(preg_match("/\d/", $fullName))  {
            $fullNameError = "* Only letters and white spaces allowed";
        }

        if(empty($email))  {
            $emailError = "* Email is required";
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "* The email address is incorrect";
        }

        if(empty($website)) {
            $websiteError = "* Website URL is required";
        } elseif(!filter_var($website, FILTER_VALIDATE_URL)) {
            $websiteError = "* Enter a valid website URL";
        }

        if(empty($gender)) {
            $genderError = "* Please select a gender";
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
        <h1 class="text-center mb-4">PHP Form Validation Example</h1>
        <div class="alert alert-danger text-center">* required field</div>
        <form action="" method="post" class="p-4 shadow-sm rounded border">
            <div class="form-group">
                <label>Full Name:</label>
                <input type="text" name="fullName" class="form-control" placeholder="Enter full name">
                <small class="text-danger"><?php echo $fullNameError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Email Address:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter email">
                <small class="text-danger"><?php echo $emailError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Website:</label>
                <input type="url" name="website" class="form-control" placeholder="Enter website URL">
                <small class="text-danger"><?php echo $websiteError; ?></small>
            </div>
            
            <div class="form-group">
                <label>Comment:</label>
                <textarea name="comment" class="form-control" placeholder="Enter your comment"></textarea>
                <small class="text-danger"><?php echo $commentError; ?></small>
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
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
