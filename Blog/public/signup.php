<?php
include '../lib/functions.php';

$errors = [];
if (!empty($_POST)) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $passwordConfirm = trim($_POST['password-confirm']);
    var_dump($firstname);
    var_dump($lastname);
    var_dump($email);
    var_dump($password);
    var_dump($passwordConfirm);

    if (!$firstname) {
        $errors['firstname'] = "Le champ prénom est obligatoire";
    }
    
    if (!$lastname) {
        $errors['lastname'] = "Le champ nom est obligatoire";
    }
    
    if (!$email) {  
        $errors['email'] = 'Le champ email est obligatoire';         
    }                                                      
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){   
        $errors['email'] = 'Email invalide';                          
    }          
    if (!$password) {
        $errors['password'] = "Le mot de passe est obligatoire";
    }
    elseif (strlen($password) > 7) {
        $errors['password'] = "Le mot de passe doit faire 8 caractères au minimum";
    }

    if (!$passwordConfirm) {
        $errors['password-confirm'] = "Veuillez confirmer le mot de passe";
    }
    elseif (strlen($passwordConfirm) > 7) {
        $errors['password-confirm'] = "La confirmation doit faire 8 caractères au minimum";
    }

    if($password != $passwordConfirm) {
        $errors['password'] = "Confirmation incorrecte";
    }
    var_dump($errors);
    var_dump($password);
    var_dump($passwordConfirm);
    var_dump(strlen($password));
    var_dump(strlen($passwordConfirm));
    // if (empty($errors)) {
    //     addArticles($title, $abstract, $content, $image);
    //     header('Location: admin.php');
    //     exit;
    // }
}

$title = 'Inscription';
$template = 'signup';
include '../templates/base.phtml';