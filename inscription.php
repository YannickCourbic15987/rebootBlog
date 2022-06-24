<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2bb89bf154.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ibscription</title>
</head>

<body>
    <?php require './component/navbar.php'; ?>
    <main class="container w-25 ">
        <!-- gestion des erreurs  -->
        <h1 class="text-center text-primary">INSCRIPTION</h1>
        <?php require './error/errorInscription.php';
        errorInscription(isset($_GET['error']), isset($_GET['user']), isset($_GET['pass']), isset($_GET['uniform']), isset($_GET['email']));
        ?>

        <?php if (isset($_GET['sucess'])) { ?>
            <div class="alert alert-success" role="alert">
                <p class="text-success">
                    votre inscription a été pris en compte ,veullez vous connectez : <a href="connect.php" class="alert-link"> se connecter</a>
                </p>
            </div>
        <?php } ?>



        <form action="./component/getInscription.php" method="post" class="mt-3">
            <p>
                <label for="email" class="form-label"> votre email : </label>
                <input type="email" name="email" id="email" class="form-control" required>
            </p>
            <p>
                <label for="username" class="form-label"> identifiant : </label>
                <input type="text" name="username" id="username" class="form-control" required>
            </p>
            <p>
                <label for="password" class="form-label"> password : </label>
                <input type="password" name="password" id="password" class="form-control" required>
            </p>
            <p>
                <label for="password_confirm" class="form-label"> password à confirmer : </label>
                <input type="password" name="password_confirm" id="password_confirm" class="form-control" required>
            </p>

            <p>
                <label class="form-label"></label>
                <input type="submit" value="s'inscrire" class=" mt-3 text-white bg-primary form-control">

            </p>

        </form>

    </main>
</body>

</html>