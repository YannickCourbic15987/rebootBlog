<?php
session_start();
require '../src/pdo.php';

echo 'ok';
if (!empty($_POST['title']) && !empty($_POST['write']) && isset($_SESSION['ID_USER'])) {
    $title = $_POST['title'];
    $write = $_POST['write'];
    $ID = $_SESSION['ID_USER'];
    $_SESSION['title'] = $title;
    $_SESSION['write'] = $write;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = $_FILES['image'];
        if ($image['size'] <= 3000000) {
            $info = pathinfo($image['name']);
            $extension = ['jpg', 'jpeg', 'gif', 'png'];
            $verifExtend = in_array($info['extension'], $extension);
            if ($verifExtend) {
                $src = __DIR__ . "/../storage/" . time() . rand() . rand() . '.' . $info['extension'];
                move_uploaded_file($image['tmp_name'], $src);
                $srcimg = "./storage/" . substr(strrchr($src, "/"), 1);
                $req = $pdo->prepare('INSERT INTO article (nom_article, description, ID_USER , scr_img) VALUES(?,?,?,?)');
            }
        }
    }
    if ($req->execute([$title, $write, $ID, $srcimg])) {
        var_dump($_SESSION);

        header('location:http://localhost/rebootBlog--v2/connect.php?success=1&article=1');
        exit();
    } else {
        header('location:http://localhost/rebootBlog--v2/connect.php?error=1&article=1');
        exit();
    }
}
