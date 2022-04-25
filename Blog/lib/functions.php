<?php
// Constantes
const FILENAME = '../data/articles.json';

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