<?php
require_once "../inc/connection.php";
require_once "../App.php";

if($req->check($req->get("id"))) {
    $id = $req->get("id");
    $res = $conn->prepare("SELECT `title` FROM todo WHERE id=:id");
    $res->bindParam(":id", $id, PDO::PARAM_INT);
    $res->execute();
    $title = $res->fetch(PDO::FETCH_ASSOC);

    if(count($title) > 0) {
        $res = $conn->prepare("DELETE FROM todo WHERE id=:id");
        $res->bindParam(":id", $id, PDO::PARAM_INT);
        $out = $res->execute();

        if($out) {
            $ses->set("success", "deleted successfully");
            $req->redirect("../index.php");
        }
    } 
    else {
        $ses->set("errors", ["not found"]);
        $req->redirect("../index.php");
    }

}
else {
    $request->redirect("../index.php");
}