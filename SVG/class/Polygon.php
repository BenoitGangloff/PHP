<?php
class Polygon extends Shape {
// Visibilité | Type | Propriétés
    protected array $points;

// Constructeur
    function __construct() {
        parent::__construct();
        $this->points=[];
    }

// Getters & Setters
    function setPosition(int ...$points) {
    // ... = Un tableau => on peut typer le contenu    
        $this->points = $points;
    }

// Autres Fonctions
    function draw():string
    {
        return '<polygon points="'.implode(' ', $this->points).'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}