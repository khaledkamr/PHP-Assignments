<?php
$correct_name = "khaled";
$correct_password = "123";
$secretMessage = "hello world";

trim(htmlspecialchars(extract($_POST)));
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Secret Message</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-5">

        <?php
            if ($name === $correct_name && $password === $correct_password) {
                echo "<div class='alert alert-success'><strong>$secretMessage</strong></div>";
            } else {
                echo "<div class='alert alert-danger'><h2>Access Denied</h2>";
                echo "<p>The name or password you entered is incorrect. Please go back and try again.</p></div>";
            }
        ?>

        <!-- Bootstrap JavaScript and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
