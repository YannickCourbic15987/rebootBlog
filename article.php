<?php
session_start();
require './src/pdo.php';


if (isset($_POST['article'])) {
    var_dump($_POST['article']);
}
$req = $pdo->prepare('select * from article');
$req->execute();
$data = $req->fetchAll();
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
<?php require './component/navbar.php';
require './success/success.php';
if (isset($_SESSION['connect'])) {
    success(isset($_GET['success']), isset($_GET['connect']), $_SESSION['user'], isset($_GET['article']), isset($_GET['delete']));
}
?>
<h1 class="text-center text-info">Publication
</h1>
<main class="container w-25 ">
    <div class="mt-5">


        <?php
        // première étape j'envoie le formulaire avec la méthode post 
        // 

        $i = 0;
        $class = 'display';
        $class1 = 'display';
        $class2 = 'd-none';

        foreach ($data as $article) {
            if (isset($_SESSION['mod']) && ($article['ID_ARTICLE'] === (int)$_SESSION['ID_ARTICLE'])) {
                $class = 'd-none';
                echo "
               <form action='./component/getNewArticle.php' method='post' enctype='multipart/form-data'>

               <div>
                   <label for='title' class='form-label'> titre </label>
                   <input type='text' value='" . $article['nom_article'] . "' name='title' id='title' class='form-control mb-3'>

               </div>
               <div>
                   <label for='write' class='form-label'> description </label>
                   <textarea name='write' class='form-control' >" . $article['description'] . "</textarea>

               </div>
                 <div>
                        <label for='image' class='form-label'>
                            image à upload
                        </label>
                        <input type='file' name='image' id='image' class='form-control'>
                    </div>
               <div>
                   <label class='form-label'> </label>
                   <input type='submit' value='publish' class='form-control mb-3 bg-info text-white'/>

               </div>
               

           </form>
               
               
               ";
            }

            if (isset($_SESSION['mod']) && $article['ID_USER'] !== $_SESSION['ID_USER']) {



                echo "<div class='mb-4 container-sm justify-content-center'>";
                echo '<div id ="container' . $i++ . '" class="' . $class1 . '"> ';
                echo " <h1 class = 'text-center text-primary'> ";
                echo $article['nom_article'];
                echo "</h1>";
                echo "<p class = 'text-center'>";
                echo $article['description'];
                echo "</p>";
                echo '<img src= ' . "{$article['scr_img']}" . ' class="img-fluid">';
                echo "<p class = 'text-center'>";
                echo "date de création : <br>";
                echo $article['date_article'];
                echo "</p>";
                echo "</div>";
            } elseif (!isset($_SESSION['mod']) && isset($_SESSION['connect'])) {
                echo "<div class='mb-4 container-sm justify-content-center'>";
                echo '<div id ="container' . $i++ . '" class="' . $class . '"> ';
                echo " <h1 class = 'text-center text-primary'> ";
                echo $article['nom_article'];
                echo "</h1>";
                echo "<p class = 'text-center'>";
                echo $article['description'];
                echo "</p>";
                echo '<img src= ' . "{$article['scr_img']}" . ' class="img-fluid">';
                echo "<p class = 'text-center'>";
                echo "date de création : <br>";
                echo $article['date_article'];
                echo "</p>";
                echo "</div>";
            }

            if (isset($_SESSION['connect'])) {

                if ($article['ID_USER'] === $_SESSION['ID_USER']) {
        ?>

                    <div class="container-fluid d-flex flex-row justify-content-center ">
                        <form action="./button/delete.php" method="post" class="mx-1">
                            <?php if (!isset($_SESSION['mod']) || $_SESSION['mod'] === 0) { ?>
                                <input type="hidden" value=<?php echo "{$article['ID_ARTICLE']}" ?> name="ID_ARTICLE">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    delete
                                </button>
                            <?php } ?>
                        </form>

                        <form action="./button/update.php" method="post">
                            <?php if (!isset($_SESSION['mod']) || $_SESSION['mod'] === 0) { ?>
                                <input type="hidden" value=<?php echo "{$article['ID_ARTICLE']}" ?> name="ID_ARTICLE">
                                <input type="hidden" value="update" name="divUpdate">
                                <button type="submit" class="btn btn-warning btn-sm text-white" id="btnUpdate">update</button>
                            <?php } ?>
                        </form>
                    </div>
        <?php }
            } else {
                echo "<div class='mb-4 container-sm justify-content-center'>";
                echo '<div id ="container' . $i++ . '" class="' . $class . '"> ';
                echo " <h1 class = 'text-center text-primary'> ";
                echo $article['nom_article'];
                echo "</h1>";
                echo "<p class = 'text-center'>";
                echo $article['description'];
                echo "</p>";
                echo '<img src= ' . "{$article['scr_img']}" . ' class="img-fluid">';
                echo "<p class = 'text-center'>";
                echo "date de création : <br>";
                echo $article['date_article'];
                echo "</p>";
                echo "</div>";
            }
            echo "</div>";
        }




        ?>

    </div>
</main>