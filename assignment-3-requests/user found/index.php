<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .container {
                max-width: 400px;
                margin-top: 50px;
            }
        </style>
    </head>
    <body>

    <div class="container">
        <?php
            $users = [
                ["username" => "khaled", "password" => "123"],
                ["username" => "user2", "password" => "123"],
                ["username" => "user3", "password" => "123"]
            ];

            $message = ""; 

            if (isset($_POST["submit"])) {
                trim(htmlspecialchars(extract($_POST)));

                if (empty($username) || empty($password)) {
                    $message = "Please fill out all fields.";
                } else {
                    $user_found = false;
                    foreach ($users as $user) {
                        if ($user['username'] === $username && $user['password'] === $password) {
                            $user_found = true;
                            break;
                        }
                    }

                    if ($user_found) {
                        echo "<script>alert('Great! You are found.');</script>";
                    } else {
                        echo "<script>alert('User not found.');</script>";
                    }
                }
            }
        ?>
        
        <?php if (isset($_POST["submit"])): ?>
            <div class="alert alert-danger"><?php echo $message; ?></div>
        <?php endif; ?>

        <form method="post" action="" class="form-group">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
