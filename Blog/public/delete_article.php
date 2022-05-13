<?php
session_start();
include '../lib/functions.php';

if(!hasRole(ROLE_ADMIN)) {
    http_response_code(403);
    echo 'Accès interdit';
    exit;
}

$id = $_GET['id'];
deleteArticle($id);
header('Location: admin.php');