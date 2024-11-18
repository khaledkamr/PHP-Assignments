<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <form action="index.php" method="post" class="p-4 shadow-sm rounded border">
        <h2 class="text-center mb-5">Simple calculator</h2>
        <div class="form-group">
            <input type="number" name="num1" class="form-control" placeholder="Enter first number" required>
        </div>
        <div class="form-group">
            <input type="number" name="num2" class="form-control" placeholder="Enter second number" required>
        </div>
        <div class="form-group d-flex">
            <select name="operation" class="form-control" required>
                <option value="add">+</option>
                <option value="sub">-</option>
                <option value="multi">*</option>
                <option value="div">/</option>
            </select>
            <button type="submit" name="submit" class="btn btn-primary ml-3">Calculate</button>
        </div>
        
    </form>

    <?php
        if (isset($_POST['submit'])) {
            trim(htmlspecialchars(extract($_POST)));
            $result = null;

            switch ($operation) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "sub":
                    $result = $num1 - $num2;
                    break;
                case "multi":
                    $result = $num1 * $num2;
                    break;
                case "div":
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = "Error! Division by zero.";
                    }
                    break;
                default:
                    $result = "Invalid Operation";
                    break;
            }

            if(is_numeric($result)) {
                echo "<h3 class='alert alert-info mt-5'>Result: $result</h3>";
            } else {
                echo "<h3 class='alert alert-danger mt-5'>Result: $result</h3>";
            }
        }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
