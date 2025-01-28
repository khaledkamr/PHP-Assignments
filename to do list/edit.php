<?php
require_once 'inc/header.php';
require_once "App.php";
require_once "inc/connection.php";

if($req->check($req->get("id"))) {
    $id = $req->get("id");
}

$res = $conn->prepare("SELECT `title` FROM todo WHERE id=:id");
$res->bindParam(":id", $id, PDO::PARAM_INT);
$res->execute();
$title = $res->fetch(PDO::FETCH_ASSOC);

if(!count($title) > 0) {
    $req->redirect("index.php");
}
?>

<body class="container w-50 mt-5">
    <?php
        if($ses->get("errors")) { 
            foreach($ses->get("errors") as $error) {
            ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
        <?php
            }
        }
        $ses->remove("errors");
    ?>    
    <form action="handle/edit.php?id=<?php echo $id ?>" method="post">
            <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php echo $title['title'] ?></textarea>
            <div class="text-center">
                <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
            </div>  
    </form>
</body>
</html>