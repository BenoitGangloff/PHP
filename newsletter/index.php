<?php
$error =null;
if (!empty($_POST)) { 
    $email = trim($_POST['email']);                         // 1 - Récupération des données du Form

    if (!$email) {                                          //
        $error = 'Le champ email est obligatoire';          //
    }                                                       //
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){    // 2 - Validation
        $error = 'Email invalide';                          //
    }                                                       //
    // @ TODO Email déjà enregistré ?                       //

    if ($error == null) {                                   // 3 - Traitements
        if (file_exists("file.json")) {
            $file = file_get_contents("file.json");
            $tabMail = json_decode($file, true);
            for ($i=0; $i < $tabMail; $i++) { 
                if ($tabMail[$i] = $email) {
                    $error = 'Utilisateur déjà enregistré';
                    return;
                }
            }
        } elseif (!file_exists("file.json") || filesize("file.json")==0) {
            $tabMail = [];
        }
        array_push($tabMail, $email);
        file_put_contents("file.json", json_encode($tabMail));
    }
}

include 'index.phtml';