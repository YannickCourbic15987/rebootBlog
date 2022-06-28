<?php

function errorInscription($error, $user, $pass, $uniform, $email)
{
    if ($error) {
        if ($user) {
            echo "
           <div class='alert alert-danger' role='alert'>
           <p class='text-danger'>
               l'identifiant saisie est déjà existant , choissisez en un autre
           </p>
       </div>
           ";
        } elseif ($pass) {
            echo "
            <div class='alert alert-danger' role='alert'>
            <p class='text-danger'>
                les mots de passes saisie ne sont pas identique
            </p>
        </div>
            
            ";
        } elseif ($uniform) {
            echo "
            <div class='alert alert-danger' role='alert'>
            <p class='text-danger'>
                l'identifiant et le mot de passe ne peuvent être identique 
            </p>
        </div>
            ";
        } elseif ($email) {
            echo "
            <div class='alert alert-danger' role='alert'>
            <p class='text-danger'>
                votre adresse email n'est pas valide ! ex: example@example.fr
            </p>
        </div>
            ";
        }
    }
}
