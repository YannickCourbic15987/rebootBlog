<?php
session_start();
require '../src/pdo.php';

if (!empty($_POST['title']) && !empty($_POST['write']) && isset($_SESSION['ID_USER'])) {
    $title = $_POST['title'];
    $write = $_POST['write'];
    $ID = $_SESSION['ID_USER'];
    var_dump($_SESSION);
    $req = $pdo->prepare('INSERT INTO article (nom_article, description, ID_USER) VALUES(?,?,?)');
    if ($req->execute([$title, $write, $ID])) {
        header('location:http://localhost/rebootBlog--v2/connect.php?success=1&article=1');
        exit();
    } else {
        header('location:http://localhost/rebootBlog--v2/connect.php?error=1&article=1');
        exit();
    }
}
