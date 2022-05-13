<?php
// Constantes
const FILENAME = '../data/articles.json';
const USERS = '../data/users.json';
const ROLE_USER = 'USER';
const ROLE_ADMIN = 'ADMIN';

// Chargement d'un Fichier JSON
function loadJSON(string $filepath)
{
    // Si le fichier spécifié n'existe pas on retourne false
    if (!file_exists($filepath)) {
        return false;
    }

    // On récupère le contenu du fichier
    $jsonData = file_get_contents($filepath);

    // On retourne les données désérialisées
    return json_decode($jsonData, true);
}

// Sauvegarde dans un fichier JSON
function saveJSON(string $filename, $data)
{
    // On sérialise les données en JSON
    $jsonData = json_encode($data);

    // On écrit le JSON dans le fichier
    file_put_contents($filename, $jsonData);
}

// function sortedArticles() {

// }

// Chargement des Articles
function getAllArticles(): array
{
    // On récupère le contenu de notre fichier d'abonnés
    $allArticles = loadJSON(FILENAME);

    // S'il n'existe pas ou est vide, on retourne un tableau vide
    if (!$allArticles) {
        return [];
    }

    // Sinon on retourne le contenu du fichier (le tableau contenant les emails des abonnés)
    // $allArticles = sortedArticles();

    return $allArticles;
}


function addArticles(string $title, string $abstract, string $content, string $image)
{
    $today = new DateTimeImmutable();
    // On récupère le contenu de notre fichier d'abonnés
    $allArticles = getAllArticles();

    $articles = [
        'id' => sha1(uniqid(rand(), true)),
        'title' => $title,
        'abstract' => $abstract,
        'content' => $content,
        'image' => $image,
        'createdAt' => $today->format('Y-m-d')
    ];
    
    // On ajoute l'Article dans le tableau
    $allArticles[] = $articles;

    // On enregistre à nouveau le tableau dans le fichier
    saveJSON(FILENAME, $allArticles);
}

function getOneArticle(string $id): ?array
{
    $articles = getAllArticles();
    foreach ($articles as $article) {
        if ($article['id'] == $id) {
            return $article;
        }
    }
    return null;
}

function editArticle(string $title, string $abstract, string $content, string $image, string $idArticle)
{
    $articles = getAllArticles();
    foreach ($articles as $index => $article) {
        if ($article['id'] == $idArticle) {
            $articles[$index]['title'] = $title;
            $articles[$index]['abstract'] = $abstract;
            $articles[$index]['content'] = $content;
            $articles[$index]['image'] = $image;
            break;
        }
    }

    saveJSON(FILENAME, $articles);
}

function deleteArticle(string $idArticle) {
    $articles = getAllArticles();
    $indexToDelete = null;
    foreach ($articles as $index => $article) {
        if ($article['id'] == $idArticle) {
            $indexToDelete = $index;
            break;
        }
    }
    if (!is_null($indexToDelete)) {
        array_splice($articles, $indexToDelete, 1);
    }

    saveJSON(FILENAME, $articles);
}

function bubbleSortArticles() {
    $articles = getAllArticles();
    do {
        $sorted = false;
        for ($i=0; $i < count($articles)-1; $i++) { 
            if ($articles[$i]['createdAt'] > $article[$i+1]['createdAt']) {
                
            }
        }
    } while ($sorted);
}


function getAllUsers(): array
{
    $allUsers = loadJSON(USERS);

    if (!$allUsers) {
        return [];
    }

    return $allUsers;
}

/**
 * Est-ce qu'un utilisateur existe déjà ?
 * @param string $email - L'email de l'utilisateur qu'on cherche
 */
function getUserByEmail(string $email)
{
    // On récupère le contenu de fichier JSON
    $users = loadJSON(USERS);

    // Si le fichier n'existe pas ou est vide, forcément l'utilisateur n'existe pas
    if (!$users) {
        return false;
    }

    // On parcours le tableau d'utilisateurs...
    foreach ($users as $user) {

        // Si l'un des utilisateur possède l'email qu'on teste, on retourne true
        if ($user['email'] == $email) {
            return $user;
        }
    }

    // Si on a parcouru tout le tableau sans trouver l'utilisateur, c'est qu'il n'est pas présent
    return false;
}

function addUsers(string $firstname, string $lastname, string $email, string $password)
{
    $today = new DateTimeImmutable();

    $allUsers = getAllUsers();

    $users = [
        'id' => sha1(uniqid(rand(), true)),
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'password' => $password,
        'createdAt' => $today->format('Y-m-d'),
        'role' => ROLE_USER
    ];
    
    $allUsers[] = $users;

    saveJSON(USERS, $allUsers);
}

function checkUser(string $email, string $password)
{
    $users = loadJSON(USERS);

    if (!$users) {
        return false;
    }
    
    $user = getUserByEmail($email);

    if ($user == false) {
        return false;
    }

    if (!password_verify($password, $user['password'])) {
        return false;
    }
    
    return $user;
}   

function registerUser(string $id, string $firstname, string $lastname, string $email, string $role)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['user'] = [
        'id' => $id,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $email,
        'role' => $role
    ];
}

function isConnected()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user'])) {
        return false;
    }
    return true;
}

function logout()
{
    if (isConnected()) {
        $_SESSION['user']=null;
        session_destroy();
    }
}

function hasRole(string $role)
{
    if (!isConnected()) {
        return false;
    }

    return $_SESSION['user']['role'] == $role;
}