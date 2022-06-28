<?php
require '../src/pdo.php';

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    if ($_POST['password'] !== $_POST['username']) {
        $username = $_POST['username'];
        $username = htmlspecialchars($username);
        $password = $_POST['password'];
        $password = htmlspecialchars($password);

        $req = $pdo->prepare("select * from users where username = '$username'");
        $req->execute();
        //je vais extraire les data
        $data = $req->fetch();
        //boucle foreach 

        if (password_verify($password, $data['password'])) {
            session_start();
            $_SESSION['connect'] = 1;
            $_SESSION['ID_USER'] = $data['ID_USER'];
            $_SESSION['user'] = $data['username'];
            header('location:http://localhost/rebootBlog--v2/connect.php?success=1&connect=1');
            exit();
        } else {
            header('location:http://localhost/rebootBlog--v2/connect.php?error=1&pass=1');
            exit();
        }
    }
} else {
    header('location:http://localhost/rebootBlog--v2/connect.php?error=1&uniform=1');
    exit();
}
