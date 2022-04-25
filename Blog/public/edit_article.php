<?php
include '../lib/functions.php';

//STEP 1 : Chercher les données de l'article pour préremplir le formulaire
// Validation de l'ID
if (!array_key_exists('id', $_GET) || !$_GET['id']) {
    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'ID => Message d'erreur et On arrête tout !
}

// On récupère l'ID
$id = $_GET['id'];

$article = getOneArticle($id);

if (!$article) {
    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'Article => Message d'erreur et On arrête tout !
}

// Initialisation des Variables
$title = $article['title'];
$abstract = $article['abstract'];
$content = $article['content'];
$image = $article['image'];

//STEP 2: Traitement des données du Formulaire
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
        editArticle($title, $abstract, $content, $image, $id);
        header('Location: admin.php');
        exit;
    }
}
$title = 'Blog - Editer un Article';
$titlePage = 'Modifier un Article';
$template = 'edit_article';
include '../templates/base_admin.phtml';
