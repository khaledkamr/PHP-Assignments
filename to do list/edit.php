<?php
require_once 'inc/header.php';
require_once "App.php";
require_once "inc/connection.php";

if ($req->check($req->get("id"))) {
    $id = $req->get("id");
}

$res = $conn->prepare("SELECT `title` FROM todo WHERE id=:id");
$res->bindParam(":id", $id, PDO::PARAM_INT);
$res->execute();
$title = $res->fetch(PDO::FETCH_ASSOC);

if (!count($title) > 0) {
    $req->redirect("index.php");
}
?>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Edit To-Do</h4>
                        <?php
                            if ($ses->get("errors")) {
                                foreach ($ses->get("errors") as $error) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }
                            }
                            $ses->remove("errors");
                        ?>
                        <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
                            <textarea class="form-control mb-3" rows="3" name="title" placeholder="Enter your note here"><?php echo htmlspecialchars($title['title']) ?></textarea>
                            <button type="submit" name="submit" class="btn btn-info w-100 text-white">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
