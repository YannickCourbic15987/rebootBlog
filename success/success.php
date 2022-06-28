<?php

function success($success, $connect, $username, $article, $delete)
{

    if ($success) {

        if ($connect) {
            echo "
       
        <div class='alert alert-success' role='alert'>
            <p class='text-success'>
                Vous êtes connecté avec succés " . '' . $username;

            echo "
            </p>
         </div>
            
    ";
        } elseif ($article) {
            echo "        <div class='alert alert-success' role='alert'>
            <p class='text-success'>
                Publication de votre article ,  $username ";

            echo "
            </p>
         </div>
            
    ";
        } elseif ($delete) {
            echo "        <div class='alert alert-success' role='alert'>
            <p class='text-success'>
                 $username , votre article a été supprimer avec succés ! ";

            echo "
            </p>
         </div>
            
    ";
        }
    }
}
