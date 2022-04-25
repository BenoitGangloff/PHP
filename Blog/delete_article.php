<?php
include 'functions.php';

$id = $_GET['id'];
deleteArticle($id);
header('Location: admin.php');