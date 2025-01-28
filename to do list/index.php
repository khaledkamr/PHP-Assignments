<?php 
require_once 'inc/header.php';
require_once "inc/connection.php";
require_once "App.php";
?>
<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="text-center mb-4">Add New To-Do</h4>
                        <?php
                            if ($ses->get("errors")) {
                                foreach ($ses->get("errors") as $error) {
                                    echo "<div class='alert alert-danger'>$error</div>";
                                }
                            }
                            $ses->remove("errors");
                        ?>
                        <form action="handle/addToDo.php" method="post">
                            <textarea class="form-control mb-3" rows="3" name="title" placeholder="Enter your note here"></textarea>
                            <button type="submit" name="submit" class="btn btn-info w-100 text-white">Add To-Do</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <!-- All Notes -->
            <div class="col-md-4">
                <h4 class="mb-3">All Notes</h4>
                <div>
                    <?php
                        $res = $conn->query("SELECT * FROM todo WHERE status='all' ORDER BY id DESC");
                        $notes = $res->fetchAll(PDO::FETCH_ASSOC);
                        if (count($notes) > 0) {
                            foreach ($notes as $note) {
                    ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $note["title"] ?></h5>
                            <p class="card-text"><small class="text-muted">Created: <?php echo $note["created_at"] ?></small></p>
                            <div class="d-flex justify-content-between">
                                <a href="edit.php?id=<?php echo $note['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                <a href="handle/goto.php?status=doing&id=<?php echo $note['id'] ?>" class="btn btn-sm btn-secondary">Move to Doing</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "<p class='text-center text-muted'>No notes available.</p>";
                        }
                    ?>
                </div>
            </div>

            <!-- Doing -->
            <div class="col-md-4">
                <h4 class="mb-3">Doing</h4>
                <div>
                    <?php
                        $res = $conn->query("SELECT * FROM todo WHERE status='doing' ORDER BY id DESC");
                        $notes = $res->fetchAll(PDO::FETCH_ASSOC);
                        if (count($notes) > 0) {
                            foreach ($notes as $note) {
                    ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $note["title"] ?></h5>
                            <p class="card-text"><small class="text-muted">Created: <?php echo $note["created_at"] ?></small></p>
                            <div class="text-end">
                                <a href="handle/goto.php?status=done&id=<?php echo $note['id'] ?>" class="btn btn-sm btn-success">Move to Done</a>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "<p class='text-center text-muted'>No tasks in progress.</p>";
                        }
                    ?>
                </div>
            </div>

            <!-- Done -->
            <div class="col-md-4">
                <h4 class="mb-3">Done</h4>
                <div>
                    <?php
                        $res = $conn->query("SELECT * FROM todo WHERE status='done' ORDER BY id DESC");
                        $notes = $res->fetchAll(PDO::FETCH_ASSOC);
                        if (count($notes) > 0) {
                            foreach ($notes as $note) {
                    ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $note["title"] ?></h5>
                            <p class="card-text"><small class="text-muted">Created: <?php echo $note["created_at"] ?></small></p>
                            <a href="handle/delete.php?id=<?php echo $note['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
                        </div>
                    </div>
                    <?php
                            }
                        } else {
                            echo "<p class='text-center text-muted'>No completed tasks.</p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
