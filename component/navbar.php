<nav class="navbar navbar-dark bg-dark navbar-expand">
    <div class="collapse navbar-collapse justify-content-center">
        <ul class="navbar-nav">
            <?php if (!isset($_SESSION['connect'])) { ?>
                <li class="nav-item">
                    <a href="inscription.php" class="nav-link active"> Inscription </a>
                </li>
            <?php   }  ?>
            <?php if (!isset($_SESSION['connect'])) { ?>
                <li class="nav-item">
                    <a href="connect.php" class="nav-link active"> connexion </a>
                </li>
            <?php   }  ?>


            <li class="nav-item">
                <a href="article.php" class="nav-link active"> Article </a>
            </li>
            <?php if (isset($_SESSION['connect'])) { ?>
                <li class="nav-item mx-3">

                    <a href="connect.php" class="nav-link active text-white bg-success ">
                        Ajout d'article</a>

                </li>

                <li class="nav-item ">
                    <form action="./component//deconnexion.php" method="post">
                        <button class="btn btn-danger">
                            <input type="hidden" name="logout">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </button>
                    </form>
                </li>
            <?php  } ?>



        </ul>
    </div>
</nav>