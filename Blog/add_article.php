<?php
include 'functions.php';

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
        header('Location: confirmation.html');
        exit;
    }
}

include 'add_article.phtml';