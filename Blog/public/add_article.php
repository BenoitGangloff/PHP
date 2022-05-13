<?php
session_start();
include '../lib/functions.php';

if(!hasRole(ROLE_ADMIN)) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

$errors = [];
if (!empty($_POST)) {
    $title = trim($_POST['title']);
    $abstract = trim($_POST['abstract']);
    $content = trim($_POST['content']);
    $image = trim($_POST['image']);

    if (!$title) {
        $errors['title'] = "Le champ 'Titre' est obligatoire";
    }
    
    if (!$content) {
        $errors['content'] = "Le champ 'Contenu' est obligatoire";
    }

    if (empty($errors)) {
        addArticles($title, $abstract, $content, $image);
        header('Location: admin.php');
        exit;
    }
}
$title = "Formulaire d'ajout d'article";
$titlePage = 'Administration';
$template = 'add_article';
include '../templates/base_admin.phtml';
