<?php

require_once "../App.php";
require_once "../inc/connection.php";

if($req->check($req->post('submit'))) {
    $title = $req->filter($req->post("title"));
    
    $val->validate("title", $title, ["required", "str"]);
    $errors = $val->getError();
    if($errors != false) {
        $ses->set("errors", $errors);
        $req->redirect("../index.php");
    }
    else {
        $res = $conn->prepare("INSERT INTO todo(`title`) VALUES(:title)");
        $res->bindParam(":title", $title, PDO::PARAM_STR);
        $out = $res->execute();
        if($out) {
            $ses->set("success", "note created");
            $req->redirect("../index.php");
        }
        else {
            $ses->set("errors", ["error while insert"]);
            $req->redirect("../index.php");
        }
    }
}
else {
    $req->redirect("../index.php");
}