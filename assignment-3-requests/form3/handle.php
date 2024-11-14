<?php
    session_start();
    
    if(isset($_POST["submit"])) {
        trim(htmlspecialchars(extract($_POST)));
        $errors = [];

        if(empty($id)) {
            $errors["id"] = "Required";
        } elseif(strlen($id) < 5 || strlen($id) > 12) {
            $errors["id"] = "ID must be of length 5 to 12";
        }

        if(empty($password)) {
            $errors["password"] = "Required";
        } elseif(strlen($password) < 7 || strlen($password) > 12) {
            $errors["password"] = "Password must be of length 7 to 12";
        }

        if(empty($name)) {
            $errors["name"] = "Required";
        } elseif(preg_match("/\d/", $name)) {
            $errors["name"] = "Alphabets only allowed";
        }

        if(empty($country)) {
            $errors["country"] = "Required, must select a country";
        }

        if(empty($zipCode)) {
            $errors["zipCode"] = "Required";
        } elseif(!is_numeric($zipCode)) {
            $errors["zipCode"] = "ZIP code must be numeric";
        }

        if(empty($email)) {
            $errors["email"] = "Required";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "The email must be valid";
        }

        if(empty($sex)) {
            $errors["sex"] = "Required";
        }

        if(empty($lang)) {
            $errors["lang"] = "Required";
        }

        if(!empty($errors)) {
            $_SESSION["errors"] = $errors;
            $_SESSION["id"] =  $id;
            $_SESSION["name"] =  $name;
            $_SESSION["address"] =  $address;
            $_SESSION["country"] =  $country;
            $_SESSION["zipCode"] =  $zipCode;
            $_SESSION["email"] =  $email;
            $_SESSION["about"] =  $about;

            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Result</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Your Submitted Data</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Data</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_POST as $key => $value): ?>
                            <tr>
                                <?php if(is_array($value)): ?>
                                    <td><?php echo ucfirst($key); ?></td>
                                    <td><?php echo implode(", ", $value); ?></td>
                                <?php elseif($key !== "submit"): ?>
                                    <td><?php echo ucfirst($key); ?></td>
                                    <td><?php echo htmlspecialchars($value); ?></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
