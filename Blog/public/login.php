<?php
include '../lib/functions.php';
$errors = [];
$email ='';

if (!empty($_POST)) {
    $email = strip_tags(trim($_POST['email']));
    $password = strip_tags(trim($_POST['password']));

    $userInfo = checkUser($email, $password);
    if ($userInfo) {
        $id = $userInfo['id'];
        $firstname = $userInfo['firstname'];
        $lastname = $userInfo['lastname'];
        $email = $userInfo['email'];
        $password = $userInfo['password'];
        $createdAt = $userInfo['createdAt'];
        $role = $userInfo['role'];
        registerUser($id, $firstname, $lastname, $email, $role);
    
        header('Location: home.php');
        exit;
    } 
    $error = 'Identifiants incorrects';
}


$title = 'Connexion';
$template = 'login';
include '../templates/base.phtml';