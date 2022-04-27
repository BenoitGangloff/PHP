<?php
include '../lib/functions.php';
$errors = [];
$email ='';

if (!empty($_POST)) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $userInfo = checkUser($email, $password);
    if ($userInfo) {
        $id = $userInfo['id'];
        $firstname = $userInfo['firstname'];
        $lastname = $userInfo['lastname'];
        $email = $userInfo['email'];
        $password = $userInfo['password'];
        $createdAt = $userInfo['createdAt'];
        registerUser($id, $firstname, $lastname, $email);
    
        header('Location: admin.php');
        exit;
    } 
    else {
        $error = 'Identifiants incorrects';
    }
}


$title = 'Connexion';
$template = 'login';
include '../templates/base.phtml';