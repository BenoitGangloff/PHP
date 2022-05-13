<?php
session_start();
include '../lib/functions.php';

$allArticles = getAllArticles();

$title = 'Blog';
$template = 'home';
include '../templates/base.phtml';