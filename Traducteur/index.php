<?php
function translate(string $word, string $direction){
    $dico = [
        "chien" => "dog",
        "chat" => "cat",
        "oiseau" => "bird",
        "cheval" => "horse",
        "sanglier" => "boar"
    ];
    
    switch ($direction){
        case 'toEnglish':
            if (array_key_exists($word, $dico)){
                return $dico[$word];
            }
            return false;

        case 'toFrench':
            return array_search ($word, $dico);
    }
}

if (!empty($_POST)){
    $word = $_POST['word'];
    $direction = $_POST['direction'];
    $translation = translate($word, $direction);
    if ($translation) {
        $message = "Le mot '$word' se traduit par '$translation'";
    } else {
        $message = "Le mot '$word' n'existe pas dans le dico";
    }
}

include 'index.phtml';
