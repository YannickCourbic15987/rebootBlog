<?php
session_start();
require '../src/pdo.php';
var_dump($_POST);
var_dump($_FILES);
var_dump($_SESSION);

if (isset($_POST['title']) && isset($_POST['write']) && isset($_SESSION['ID_ARTICLE']) && isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
    $nom_article = $_POST['title'];
    $description = $_POST['write'];
    $ID_ARTICLE = $_SESSION['ID_ARTICLE'];
    $image = $_FILES['image'];

    if ($image['size'] <= 3000000) {
        $info = pathinfo($image['name']);
        $extension = ['jpg', 'jpeg', 'gif', 'png'];
        $verifExtend = in_array($info['extension'], $extension);
        if ($verifExtend) {
            $src = __DIR__ . "/../storage/" . time() . rand() . rand() . '.' . $info['extension'];
            move_uploaded_file($image['tmp_name'], $src);
            $srcimg = "./storage/" . substr(strrchr($src, "/"), 1);


            $req2 = $pdo->prepare('select  * from article where ID_ARTICLE = ?');
            $req2->execute([$ID_ARTICLE]);
            $data = $req2->fetch();
            unlink('.' . $data['scr_img']);


            $req = $pdo->prepare('update article set nom_article = ? , description = ? , scr_img = ? where ID_ARTICLE = ?');
            $req->execute([$nom_article, $description, $srcimg, $ID_ARTICLE]);
            unset($_SESSION['mod']);
            header('location:http://localhost/rebootBlog--v2/article.php?success=1&update=1');
        }
    }
}
