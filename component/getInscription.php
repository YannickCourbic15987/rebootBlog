<?php
require '../src/pdo.php';
if (
    !empty($_POST['email'])
    && !empty($_POST['username'])
    && !empty($_POST['password'])
    && !empty($_POST['password_confirm'])
    && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false
) {
    //je verifie si l'adresse email est valide ou non ! 

    //je commence par vérifier si le mot de passe et l'identifiant ne sont pas pareils !
    if ($_POST['password'] !== $_POST['username']) {
        // vérification si les deux mdp sont identiques !
        if ($_POST['password'] === $_POST['password_confirm']) {
            $password = $_POST['password'];
            $password = htmlspecialchars($password);
            $password = password_hash($password, PASSWORD_ARGON2I);
            $email = $_POST['email'];
            $username = $_POST['username'];
            $username = htmlspecialchars($username);
            // je sélectionne tout la table users 
            $req = $pdo->prepare('select * from users');
            $req->execute();
            //exe
            $data = $req->fetchAll();
            //extraction des données 

            foreach ($data as $users) {
                var_dump($_POST);
                //je vérifie si l'identifiant n'est pas dans la base de données 

                if ($username === $users['username']) {
                    header('location:http://localhost/rebootBlog--v2/inscription.php?error=1&user=1');
                    exit();
                } else {
                    $req = $pdo->prepare("insert into users (email,username,password) values (?,?,?)");
                    $req->execute([$email, $username, $password]);
                    header('location:http://localhost/rebootBlog--v2/inscription.php?sucess=1');
                    exit();
                }
            }
        } else {
            header('location:http://localhost/rebootBlog--v2/inscription.php?error=1&pass=1');
            exit();
        }
    } else {
        header('location:http://localhost/rebootBlog--v2/inscription.php?error=1&uniform=1');
        exit();
    }
} else {
    header('location:http://localhost/rebootBlog--v2/inscription.php?error=1&email=1');
    exit();
}
