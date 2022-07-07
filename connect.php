<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2bb89bf154.js" crossorigin="anonymous"></script>
    <title>connection</title>
</head>

<body>
    <?php require './src/pdo.php';
    require './component/navbar.php';
    ?>

    <!-- gestion des success si la session existe  -->

    <?php require './success/success.php';
    if (isset($_SESSION['connect'])) {
        success(isset($_GET['success']), isset($_GET['connect']), $_SESSION['user'], isset($_GET['article']), isset($_GET['delete']));
    } else {
        if (isset($_GET['success'])) {
            if (isset($_GET['deco'])) {
                echo "
       
                <div class='alert alert-info' role='alert'>
                    <p class='text-info'>
                        Vous êtes  deconnecté avec succès ";

                echo "
                    </p>
                 </div>
                    
            ";
            }
        }
    }
    ?>

    <?php if (!isset($_SESSION['connect'])) { ?>

        <main class="container w-25 ">
            <h1 class="text-center text-primary">CONNEXION</h1>
            <!-- gestion des erreurs  -->
            <?php require './error/errorInscription.php';
            errorInscription(!empty($_GET['error']), !empty($_GET['user']), !empty($_GET['pass']), !empty($_GET['uniform']), !empty($_GET['email']));
            ?>
            <form action="./component/getConnect.php" method="post" class="mt-3">
                <p>
                    <label for="username" class="form-label"> identifiant : </label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </p>
                <p>
                    <label for="password" class="form-label"> password : </label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </p>

                <p>
                    <label class="form-label"></label>
                    <input type="submit" value="s'inscrire" class=" mt-3 text-white bg-primary form-control">

                </p>

            </form>

        <?php } ?>
        <?php if (isset($_SESSION['connect'])) { ?>
            <main class="container w-25 ">
                <h1 class="text-warning text-center mb-5 mt-5">Publication</h1>
                <form action="./component/getArticle.php" method="post" enctype="multipart/form-data">

                    <div>
                        <label for="title" class="form-label"> titre </label>
                        <input type="text" name="title" id="title" class="form-control mb-3">

                    </div>
                    <div>
                        <label for="write" class="form-label "> description </label>
                        <textarea name="write" class="form-control"></textarea>

                    </div>
                    <div>
                        <label for="image" class="form-label">
                            image à upload
                        </label>
                        <input type="file" name="image" id="image" class="form-control"></input>
                    </div>
                    <div>
                        <label class="form-label"> </label>
                        <input type="submit" value="publish" class="form-control mb-3 bg-info text-white">

                    </div>

                </form>
            </main>
        <?php } ?>

        </main>




</body>

</html>