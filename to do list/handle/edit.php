<?php
require_once "../inc/connection.php";
require_once "../App.php";

if($req->check($req->post("submit")) && $req->check($req->get("id"))) {
    $id = $req->get("id");
    $title = $req->filter($req->post("title"));
    $val->validate("title", $title, ["Required", "Str"]);
    $errors = $val->getError();

    if($errors == false) {
        $res = $conn->prepare("SELECT `title` FROM todo WHERE id=:id");
        $res->bindParam(":id", $id, PDO::PARAM_INT);
        $res->execute();
        $out = $res->fetch(PDO::FETCH_ASSOC);

        if(count($out) > 0) {
            $res = $conn->prepare("UPDATE todo SET title=:title WHERE id=:id");
            $res->bindParam(":title", $title, PDO::PARAM_STR);
            $res->bindParam(":id", $id, PDO::PARAM_INT);
            $out = $res->execute();

            if($out) {
                $ses->set("success", "note updated successfully");
                $req->redirect("../index.php");
            }
            else {
                $ses->set("errors", ["error while update"]);
                $req->redirect(".../edit.php?id=$id");
            }
        }
        else {
            $ses->set("errors", ["title not found"]);
            $req->redirect("../index.php");
        }
    }
    else {
        $ses->set("errors", $errors);
        $req->redirect("../edit.php?id=$id");
    }
}
else {
    $req->redirect("../index.php");
}