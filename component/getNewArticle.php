<?php
session_start();
require '../src/pdo.php';
var_dump($_POST);
if (isset($_POST['title']) && isset($_POST['write']) && isset($_POST['ID_ARTICLE'])) {
    $nom_article = $_POST['title'];
    $description = $_POST['write'];
    $ID_ARTICLE = $_POST['ID_ARTICLE'];

    $req = $pdo->prepare('update article set nom_article = ? , description = ? where ID_ARTICLE = ?');
    $req->execute([$nom_article, $description, $ID_ARTICLE]);
    unset($_SESSION['mod']);
    header('location:http://localhost/rebootBlog--v2/article.php?success=1&update=1');
}
