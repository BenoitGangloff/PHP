<?php
include '../lib/functions.php';

$allArticles = getAllArticles();

$title = 'Blog - Administration';
$script = '<script src="js/admin.js" defer></script>';
$titlePage = 'Administration';
$template = 'admin';
include '../templates/base_admin.phtml';