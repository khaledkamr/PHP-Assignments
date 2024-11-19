<?php
$data = [
    "John" => ["Jenny", "Pearl", "Luca"],
    "Claire" => ["Enrique", "Paul"]
];

$message = "";

if (isset($_POST["submit"])) {
    trim(htmlspecialchars(extract($_POST)));
    $parent_name = ucfirst($parent_name);
    $child_name = ucfirst($child_name);

    if ($parent_name && $child_name) {
        if (!isset($data[$parent_name])) {
            $data[$parent_name] = []; 
        }

        if (isset($data[$parent_name]) && in_array($child_name, $data[$parent_name])) {
            $message = "Found";
        } else {
            $message = "Not found";
            $data[$parent_name][] = $child_name;
        }
        
    } else {
        $message = "Please enter both parent and child names.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parent-Child Data</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            <h2 class="text-center mb-4">PHP - Multiple form inputs</h2>
            <div class="row">
                <div class="card p-4 shadow-sm mb-4 col-sm-12 col-md-9 col-lg-6 m-auto">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="parent_name">Parent Name:</label>
                            <input type="text" name="parent_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="child_name">Child's Name:</label>
                            <input type="text" name="child_name" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <?php if ($message == "Found"): ?>
                <div class="alert alert-info text-center">
                    <?php echo $message; ?>
                </div>
            <?php elseif ($message): ?>
                <div class="alert alert-danger text-center">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <h2 class="text-center mb-4 mt-5">Parent-Child Data Table</h2>
            <div class="row">
                <div class="table-responsive col-sm-12 col-md-9 col-lg-6 m-auto">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Parent Name</th>
                                <th>Children's Names</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $parent => $children): ?>
                                <tr>
                                    <td><?php echo $parent; ?></td>
                                    <td><?php echo implode(", ", $children); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>
