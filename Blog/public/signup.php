<?php
session_start();
include '../lib/functions.php';

$errors = [];
$firstname = '';
$lastname = '';
$email = '';

if (!empty($_POST)) {
    $firstname = strip_tags(trim($_POST['firstname']));
    $lastname = strip_tags(trim($_POST['lastname']));
    $email = strip_tags(trim($_POST['email']));
    $password = strip_tags(trim($_POST['password']));
    $passwordConfirm = strip_tags(trim($_POST['password-confirm']));


    if (!strlen($firstname)) {
        $errors['firstname'] = 'Le champ "Prénom" est obligatoire';
    }

    if (!strlen($lastname)) {
        $errors['lastname'] = 'Le champ "Nom" est obligatoire';
    }

    if (!strlen($email)) {
        $errors['email'] = 'Le champ "Email" est obligatoire';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invalide';
    }
    elseif (getUserByEmail($email)) {
        $errors['email'] = 'Un compte existe déjà avec cet email';
    }

    if (strlen($password) < 8) {
        $errors['password'] = "Le mot de passe doit faire 8 caractères au minimum";
    }
    elseif($password != $passwordConfirm) {
        $errors['password'] = "Confirmation incorrecte";
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        addUsers($firstname, $lastname, $email, $hash);
        // header('Location: admin.php');
        header('Location: login.php');
        exit;
    }
}

$title = 'Inscription';
$template = 'signup';
include '../templates/base.phtml';