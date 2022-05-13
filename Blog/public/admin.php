<?php
session_start();
include '../lib/functions.php';

if(!hasRole(ROLE_ADMIN)) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

$allArticles = getAllArticles();

$title = 'Blog - Administration';
$script = '<script src="js/admin.js" defer></script>';
$titlePage = 'Administration';
$template = 'admin';
include '../templates/base_admin.phtml';