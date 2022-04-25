<?php
include '../lib/functions.php';

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
$title = 'Blog - Un Article';
$template = 'article';
include '../templates/base.phtml';