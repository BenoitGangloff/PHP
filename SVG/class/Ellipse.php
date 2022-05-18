<?php
class Ellipse extends Shape {
// Visibilité | Type | Propriétés
    protected int $rx;
    protected int $ry;

// Constructeur
    function __construct() {
        parent::__construct();
        $this->rx=10;
        $this->ry=5;
    }

// Getters & Setters
    function setSize(int $rx, int $ry) {
        $this->rx = $rx;
        $this->ry = $ry;
    }

// Autres Fonctions
    function draw():string
    {
        return '<ellipse cx="'.$this->x.'" cy="'.$this->y.'" rx="'.$this->rx.'" ry="'.$this->ry.'" fill="'.$this->color.'" opacity="'.$this->opacity.'" />';
    }
}